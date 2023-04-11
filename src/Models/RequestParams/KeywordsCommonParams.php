<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Models\RequestParams;


final class KeywordsCommonParams extends RequestParams
{
    /**
     * The list of parameter names and default values.
     *
     * @var array
     */
    protected $params = [
        'adGroupIdFilter'           => null,
        'keywordIdFilter'           => null,
        'stateFilter'               => null,
        'maxResults'                => null,
        'nextToken'                 => null,
        'includeExtendedDataFields' => null,
        'keywordTextFilter'         => null,
        'matchTypeFilter'           => null,
    ];

    /**
     * A list of parameter names and the name of their associated setter method.
     *
     * @var array
     */
    protected $map = [
        'adGroupIdFilter'           => 'setadGroupIdFilter',
        'keywordIdFilter'           => 'setKeywordIdFilter',
        'stateFilter'               => 'setStateFilter',
        'maxResults'                => 'setMaxResults',
        'nextToken'                 => 'setNextToken',
        'includeExtendedDataFields' => 'setIncludeExtendedDataFields',
        'keywordTextFilter'         => 'setkeywordTextFilter',
        'matchTypeFilter'           => 'setMatchTypeFilter',
        'campaignIdFilter'          => 'setCampaignIdFilter',
    ];

    /**
     * A list of array parameters that should be imploded to a single string value.
     *
     * @var array
     */
    protected $filters = [];

    public function setKeywordIdFilter($keywordId)
    {
        $this->params['keywordId'] = $keywordId;

        return $this;
    }
    public function setMatchTypeFilter($matchTypeFilter)
    {
        $this->params['matchTypeFilter'] = $matchTypeFilter;

        return $this;
    }
    public function setCampaignIdFilter($campaignIdFilter)
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
    public function setKeywordTextFilter($keywordTextFilter): self
    {
        $this->params['keywordTextFilter'] = $keywordTextFilter;
        return $this;
    }
}
