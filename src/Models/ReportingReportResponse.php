<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Models;

use PowerSrc\AmazonAdvertisingApi\Concerns\HasPropertyCasts;
use PowerSrc\AmazonAdvertisingApi\Enums\PrimitiveType;
use PowerSrc\AmazonAdvertisingApi\Enums\ReportingReportStatus;

class ReportingReportResponse extends Model
{
    use HasPropertyCasts;

    /**
     * The ID of the report that was requested.
     *
     * @var string
     */
    public $reportId;

    /**
     * The status of the generation of the report,
     * it can be IN_PROGRESS, SUCCESS or FAILURE.
     *
     * @var ReportingReportStatus
     */
    public $status;

    /**
     * The size of the report file in bytes.
     * It's only available if status is SUCCESS.
     *
     * @var int
     */
    public $fileSize;
    public $configuration;
    public $createdAt;
    public $endDate;
    public $failureReason;
    public $generatedAt;
    public $name;
    public $startDate;
    public $url;
    public $updatedAt;
    public $urlExpiresAt;

    /**
     * An array of types to cast values to on object creation.
     *
     * The property to cast is the key and the type to cast to is the value.
     *
     * @var array
     */
    private $casts = [
        'reportId'      => PrimitiveType::STRING,
        'status'        => ReportingReportStatus::class,
        'fileSize'      => PrimitiveType::INT,
        'createdAt'      => PrimitiveType::STRING,
        'endDate'      => PrimitiveType::STRING,
        'failureReason'      => PrimitiveType::STRING,
        'generatedAt'      => PrimitiveType::STRING,
        'name'      => PrimitiveType::STRING,
        'startDate'      => PrimitiveType::STRING,
        'updatedAt'      => PrimitiveType::STRING,
        'url'      => PrimitiveType::STRING,
        'urlExpiresAt'      => PrimitiveType::STRING,
    ];
}
