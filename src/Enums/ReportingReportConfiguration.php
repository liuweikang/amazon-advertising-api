<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Enums;

/**
 * @method static ReportingReportStatus SUCCESS()
 * @method static ReportingReportStatus FAILURE()
 * @method static ReportingReportStatus IN_PROGRESS()
 */
class ReportingReportStatus extends Enum
{
    public const FAILURE     = 'FAILURE';
    public const PROCESSING = 'PROCESSING';
    public const PENDING = 'PENDING';
    public const COMPLETED = 'COMPLETED';

    public function isSuccess(): bool
    {
        return $this->getValue() === static::COMPLETED;
    }

    public function isFailure(): bool
    {
        return $this->getValue() === static::FAILURE;
    }

    public function isInProgress(): bool
    {
        return in_array($this->getValue(), [static::PENDING, static::PROCESSING]);
    }
}
