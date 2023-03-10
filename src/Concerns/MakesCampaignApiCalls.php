<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Concerns;

use GuzzleHttp\Exception\GuzzleException;
use PowerSrc\AmazonAdvertisingApi\Enums\HttpMethod;
use PowerSrc\AmazonAdvertisingApi\Enums\MimeType;
use PowerSrc\AmazonAdvertisingApi\Exceptions\ClassNotFoundException;
use PowerSrc\AmazonAdvertisingApi\Exceptions\HttpException;
use PowerSrc\AmazonAdvertisingApi\Models\Campaign;
use PowerSrc\AmazonAdvertisingApi\Models\CampaignEx;
use PowerSrc\AmazonAdvertisingApi\Models\CampaignResponse;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Campaign\CampaignCreateList;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Campaign\CampaignExList;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Campaign\CampaignList;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Campaign\CampaignResponseList;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\Campaign\CampaignUpdateList;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\CampaignCommonParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\CampaignParams;
use ReflectionException;

trait MakesCampaignApiCalls
{
    /**
     * Retrieves a campaign by campaignId. Note that this call returns the minimal
     * set of campaign fields, but is more efficient than getCampaignEx.
     *
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function getCampaign(int $campaignId): Campaign
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('sp/campaigns/' . $campaignId));

        return new Campaign($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Retrieves a campaign and its extended fields by campaignId.
     *
     * Note that this call returns the complete set of campaign fields
     * (including serving status and other read-only fields),
     * but is less efficient than getCampaign.
     *
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function getCampaignEx(int $campaignId): CampaignEx
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('sp/campaigns/extended/' . $campaignId));

        return new CampaignEx($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Creates one or more campaigns. Successfully created campaigns
     * will be assigned a unique campaignId.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function createCampaigns(CampaignCreateList $campaignList): CampaignResponseList
    {
        $response = $this->operation(HttpMethod::POST(), $this->getApiUrl('sp/campaigns'), $campaignList);

        return new CampaignResponseList($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Updates one or more campaigns. A list of up to 100 updates
     * containing campaignId, and the mutable fields to be modified.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function updateCampaigns(CampaignUpdateList $campaignList): CampaignResponseList
    {
        $response = $this->operation(HttpMethod::PUT(), $this->getApiUrl('sp/campaigns'), $campaignList);

        return new CampaignResponseList($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Sets the campaign status archived. Archived entities cannot be made active again.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws HttpException
     * @throws ReflectionException
     */
    public function archiveCampaign(int $campaignId): CampaignResponse
    {
        $response = $this->operation(HttpMethod::DELETE(), $this->getApiUrl('sp/campaigns/' . $campaignId));

        return new CampaignResponse($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Retrieves a list of Sponsored Products campaigns satisfying optional filtering criteria.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws HttpException
     * @throws ReflectionException
     */
    public function listCampaigns(CampaignParams $params): CampaignList
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('sp/campaigns', $params));

        return new CampaignList($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Retrieves a list of Sponsored Products campaigns with extended fields satisfying optional filtering criteria.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws HttpException
     * @throws ReflectionException
     */
    public function listCampaignsEx(CampaignParams $params): CampaignExList
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('sp/campaigns/extended', $params));

        return new CampaignExList($this->decodeResponseBody($response, MimeType::JSON()));
    }
    /**
     * sb 广告活动
     * @param CampaignSbParams $params
     * @description
     * @author Bosh
     * @throws
     * @since 2023-03-08
     */
    public function listSbCampaigns(?CampaignCommonParams $params = null)
    {
        $this->accept = 'application/vnd.sbcampaignresource.v4+json';
        $response = $this->operation(HttpMethod::POST(), $this->getApiUrl('sb/v4/campaigns/list'), $params);

        return json_decode(json_encode($this->decodeResponseBody($response, MimeType::JSON())), true);
    }
    /**
     * sd 广告活动
     * @param CampaignParams $params
     * @description
     * @author Bosh
     * @throws
     * @since 2023-03-08
     */
    public function listSdCampaigns(?CampaignParams $params = null)
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('sd/campaigns', $params));
        return json_decode(json_encode($this->decodeResponseBody($response, MimeType::JSON())), true);
    }
    /**
     * sp 广告活动
     * @param CampaignCommonParams $params
     * @description
     * @author Bosh
     * @throws
     * @since 2023-03-08
     */
    public function listSpCampaigns(?CampaignCommonParams $params = null)
    {
        $this->accept = $this->contentType = 'application/vnd.spCampaign.v3+json';
        $response = $this->operation(HttpMethod::POST(), $this->getApiUrl('sp/campaigns/list'), $params);
        return json_decode(json_encode($this->decodeResponseBody($response, MimeType::JSON())), true);
    }
}
