<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Models\RequestParams;


final class AdGroupCommonParams extends RequestParams
{
    /**
     * The list of parameter names and default values.
     *
     * @var array
     */
    protected $params = [
        'adGroupIdFilter'          => null,
        'portfolioIdFilter'         => null,
        'stateFilter'               => null,
        'maxResults'                => null,
        'nextToken'                 => null,
        'includeExtendedDataFields' => null,
        'nameFilter'                => null,
    ];

    /**
     * A list of parameter names and the name of their associated setter method.
     *
     * @var array
     */
    protected $map = [
        'adGroupIdFilter'           => 'setadGroupIdFilter',
        'portfolioIdFilter'         => 'setPortfolioIdFilter',
        'stateFilter'               => 'setStateFilter',
        'maxResults'                => 'setMaxResults',
        'nextToken'                 => 'setNextToken',
        'includeExtendedDataFields' => 'setIncludeExtendedDataFields',
        'nameFilter'                => 'setNameFilter',
    ];

    /**
     * A list of array parameters that should be imploded to a single string value.
     *
     * @var array
     */
    protected $filters = [];

    public function setAdGroupIdFilter($adGroupIdFilter): self
    {
        $this->params['adGroupIdFilter'] = $adGroupIdFilter;

        return $this;
    }

    public function setPortfolioIdFilter($portfolioIdFilter): self
    {
        $this->params['portfolioIdFilter'] = $portfolioIdFilter;
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
    public function setNameFilter($nameFilter): self
    {
        $this->params['nameFilter'] = $nameFilter;
        return $this;
    }
}
