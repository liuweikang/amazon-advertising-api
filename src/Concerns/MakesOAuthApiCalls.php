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
        return $this->do($params);
    }
    /**
     * 获取access_token
     * @param string $clientSecret
     * @param string $code
     * @param string $redirectUri
     * @description
     * @author Bosh
     * @throws
     * @since 2023-03-02
     */
    public function getRefreshAuthToken(string $clientSecret, string $code, string $redirectUri)
    {
        $params = [
            'grant_type'    => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirectUri,
            'client_id'     => $this->config->getClientId(),
            'client_secret' => $clientSecret,
        ];

        return $this->do($params);
        
    }



    private function do($params)
    {
        $options = \array_merge([
            RequestOptions::HEADERS     => ['Accept' => MimeType::JSON],
            RequestOptions::HTTP_ERRORS => false,
            'curl'                      => [CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2],
        ], $params ? [RequestOptions::FORM_PARAMS => $params] : []);

        $domain = $this->config->getRegion()->getTokenDomain();
        $response = $this->httpClient->request(HttpMethod::POST, sprintf('https://%s', $domain), $options);

        $this->lastRequestId = $this->getAmazonRequestId($response);

        if (!$this->responseCanBeParsed($response)) {
            $this->handleHttpError($response, 'Login with Amazon returned an unparsable response', 406);
        }

        $lwaAuthResponse = new LWAAuthResponse(CastType::fromJson(CastType::toString($response->getBody())));
        if ($this->shouldThrowHttpException($response->getStatusCode()) || $lwaAuthResponse->isErrorResponse()) {
            $this->handleHttpError($response, $lwaAuthResponse->error_description, $lwaAuthResponse->getErrorCode());
        }
        return $lwaAuthResponse;
    }
}
