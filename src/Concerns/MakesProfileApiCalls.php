<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Concerns;

use GuzzleHttp\Exception\GuzzleException;
use PowerSrc\AmazonAdvertisingApi\Enums\HttpMethod;
use PowerSrc\AmazonAdvertisingApi\Enums\MimeType;
use PowerSrc\AmazonAdvertisingApi\Exceptions\ClassNotFoundException;
use PowerSrc\AmazonAdvertisingApi\Exceptions\HttpException;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Profile\ProfileList;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Profile\ProfileResponseList;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Profile\ProfileUpdateList;
use PowerSrc\AmazonAdvertisingApi\Models\Profile;
use PowerSrc\AmazonAdvertisingApi\Models\ProfileResponse;
use ReflectionException;

trait MakesProfileApiCalls
{
    /**
     * Retrieves profiles associated with an auth token.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function listProfiles(): ProfileList
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('profiles'));

        return new ProfileList($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Retrieves a single profile by ID.
     *
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function getProfile(int $profileId): Profile
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('profiles/' . $profileId));

        return new Profile($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Updates one or more profiles. Advertisers are identified using their profileId.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function updateProfiles(ProfileUpdateList $profileList): ProfileResponseList
    {
        $response = $this->operation(HttpMethod::PUT(), $this->getApiUrl('profiles'), $profileList);

        return new ProfileResponseList($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Registers a profile in sandbox. If this call is made to a production endpoint you will receive an error.
     *
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function registerProfile(Profile $profile): ProfileResponse
    {
        $response = $this->operation(HttpMethod::PUT(), $this->getApiUrl('profiles/register'), $profile);

        return new ProfileResponse($this->decodeResponseBody($response, MimeType::JSON()));
    }
}
