<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Concerns;

use GuzzleHttp\Exception\GuzzleException;
use PowerSrc\AmazonAdvertisingApi\Enums\HttpMethod;
use PowerSrc\AmazonAdvertisingApi\Enums\MimeType;
use PowerSrc\AmazonAdvertisingApi\Exceptions\ClassNotFoundException;
use ReflectionException;
use GuzzleHttp\RequestOptions;
use PowerSrc\AmazonAdvertisingApi\Models\LWAAuthResponse;
use PowerSrc\AmazonAdvertisingApi\Support\CastType;

trait MakesOAuthApiCalls
{
    use HandlesApiErrors;
    /**
     * Calls the Amazon oauth endpoint to refresh the access token.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function refreshAuthToken(string $clientSecret, string $refreshToken)
    {
        $params = [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id'     => $this->config->getClientId(),
            'client_secret' => $clientSecret,
        ];
        $options = \array_merge([
            RequestOptions::HEADERS     => ['Accept' => MimeType::JSON],
            RequestOptions::HTTP_ERRORS => false,
            'curl'                      => [CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2],
        ], $params ? [RequestOptions::FORM_PARAMS => $params] : []);

        $response = $this->httpClient->request(HttpMethod::POST, 'https://api.amazon.com/auth/o2/token', $options);

        $this->lastRequestId = $this->getAmazonRequestId($response);

        if ( ! $this->responseCanBeParsed($response)) {
            $this->handleHttpError($response, 'Login with Amazon returned an unparsable response', 406);
        }

        $lwaAuthResponse = new LWAAuthResponse(CastType::fromJson(CastType::toString($response->getBody())));
        if ($this->shouldThrowHttpException($response->getStatusCode()) || $lwaAuthResponse->isErrorResponse()) {
            $this->handleHttpError($response, $lwaAuthResponse->error_description, $lwaAuthResponse->getErrorCode());
        }
        return $lwaAuthResponse;
        
    }
}
