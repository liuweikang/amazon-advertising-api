<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Models\RequestParams;

use function get_class;
use PowerSrc\AmazonAdvertisingApi\Enums\ReportSegment;
use PowerSrc\AmazonAdvertisingApi\Exceptions\InvalidMetricListTypeException;
use PowerSrc\AmazonAdvertisingApi\Models\Lists\ReportMetricsList;
use function sprintf;

abstract class ReportParams extends RequestParams
{
    /**
     * The list of parameter names and default values.
     *
     * @var array
     */
    protected $params = [
        'segment'    => null,
        'reportDate' => null,
        'metrics'    => null,
        'creativeType'    => null,
        'tactic'    => null,
    ];

    /**
     * A list of parameter names and the name of their associated setter method.
     *
     * @var array
     */
    protected $map = [
        'segment'    => 'setSegment',
        'reportDate' => 'setReportDate',
        'metrics'    => 'setMetrics',
        'creativeType'    => 'setCreativeType',
        'tactic'    => 'setTactic',
    ];

    /**
     * A list of array parameters that should be imploded to a single string value.
     *
     * @var array
     */
    protected $filters = [
        'metrics',
    ];

    /**
     * @throws InvalidMetricListTypeException
     */
    public function setMetrics($metricsList): self
    {
        // $metricsListClass = $this->getMetricsListType();
        // if ( ! $metricsList instanceof $metricsListClass) {
        //     $msg = sprintf('Invalid metrics list type. Instance of `%s` provided but instance of `%s` required.', get_class($metricsList), $metricsListClass);
        //     throw new InvalidMetricListTypeException($msg);
        // }

        $this->params['metrics'] = $metricsList;

        return $this;
    }

    public function setSegment(ReportSegment $segment): self
    {
        $this->params['segment'] = $segment;

        return $this;
    }

    public function setReportDate(string $reportDate): self
    {
        $this->params['reportDate'] = $reportDate;

        return $this;
    }

    public function setCreativeType(string $creativeType): self
    {
        $this->params['creativeType'] = $creativeType;

        return $this;
    }
    public function setTactic($tactic): self
    {
        $this->params['tactic'] = $tactic;

        return $this;
    }

    /**
     * Return the classname of the requested report's metric list type.
     */
    abstract protected function getMetricsListType(): string;
}
