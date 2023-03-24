<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Models\RequestParams;


final class ProductAdsCommonParams extends RequestParams
{
    /**
     * The list of parameter names and default values.
     *
     * @var array
     */
    protected $params = [
        'adGroupIdFilter'          => null,
        'campaignIdFilter'          => null,
        'stateFilter'               => null,
        'maxResults'                => null,
        'nextToken'                 => null,
        'includeExtendedDataFields' => null,
        'adIdFilter'                => null,
    ];

    /**
     * A list of parameter names and the name of their associated setter method.
     *
     * @var array
     */
    protected $map = [
        'campaignIdFilter'          => 'setCampaignIdFilter',
        'adGroupIdFilter'           => 'setadGroupIdFilter',
        'stateFilter'               => 'setStateFilter',
        'maxResults'                => 'setMaxResults',
        'nextToken'                 => 'setNextToken',
        'includeExtendedDataFields' => 'setIncludeExtendedDataFields',
        'adIdFilter'                => 'setAdIdFilter',
    ];

    /**
     * A list of array parameters that should be imploded to a single string value.
     *
     * @var array
     */
    protected $filters = [];

    public function setCampaignIdFilter($campaignIdFilter): self
    {
        $this->params['campaignIdFilter'] = $campaignIdFilter;

        return $this;
    }

    public function setAdGroupIdFilter($adGroupIdFilter): self
    {
        $this->params['adGroupIdFilter'] = $adGroupIdFilter;

        return $this;
    }

    public function setStateFilter($stateFilter): self
    {
        $this->params['stateFilter'] = $stateFilter;
        return $this;
    }
    public function setMaxResults($maxResults): self
    {
        $this->params['maxResults'] = $maxResults;
        return $this;
    }
    public function setNextToken($nextToken): self
    {
        $this->params['nextToken'] = $nextToken;
        return $this;
    }
    public function setIncludeExtendedDataFields($includeExtendedDataFields): self
    {
        $this->params['includeExtendedDataFields'] = $includeExtendedDataFields;
        return $this;
    }
    public function setAdIdFilter($adIdFilter): self
    {
        $this->params['adIdFilter'] = $adIdFilter;
        return $this;
    }
}
