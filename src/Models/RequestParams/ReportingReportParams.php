<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Models\RequestParams;


use PowerSrc\AmazonAdvertisingApi\Exceptions\InvalidMetricListTypeException;

class ReportingReportParams extends RequestParams
{
    /**
     * The list of parameter names and default values.
     *
     * @var array
     */
    protected $params = [
        'name'    => null,
        'startDate' => null,
        'endDate'    => null,
        'configuration'    => null,
    ];

    /**
     * A list of parameter names and the name of their associated setter method.
     *
     * @var array
     */
    protected $map = [
        'name'    => 'setName',
        'startDate' => 'setStartDate',
        'endDate'    => 'setEndDate',
        'configuration'    => 'setConfiguration',
    ];

    /**
     * A list of array parameters that should be imploded to a single string value.
     *
     * @var array
     */
    protected $filters = [
        
    ];

    /**
     * @throws InvalidMetricListTypeException
     */
    public function setName(string $name): self
    {

        $this->params['name'] = $name;

        return $this;
    }

    public function setStartDate(string $startDate): self
    {
        $this->params['startDate'] = $startDate;

        return $this;
    }

    public function setEndDate(string $endDate): self
    {
        $this->params['endDate'] = $endDate;

        return $this;
    }

    public function setConfiguration(array $configuration): self
    {
        $this->params['configuration'] = $configuration;

        return $this;
    }

}
