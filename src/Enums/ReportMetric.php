<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Enums;

use PowerSrc\AmazonAdvertisingApi\Support\Arr;

/**
 * @method static ReportMetric BID_PLUS()
 * @method static ReportMetric CAMPAIGN_NAME()
 * @method static ReportMetric CAMPAIGN_ID()
 * @method static ReportMetric CAMPAIGN_STATUS()
 * @method static ReportMetric CAMPAIGN_BUDGET()
 * @method static ReportMetric AD_GROUP_NAME()
 * @method static ReportMetric AD_GROUP_ID()
 * @method static ReportMetric KEYWORD_ID()
 * @method static ReportMetric KEYWORD_TEXT()
 * @method static ReportMetric PORTFOLIO_ID()
 * @method static ReportMetric PORTFOLIO_NAME()
 * @method static ReportMetric TARGET_ID()
 * @method static ReportMetric TARGETING_EXPRESSION()
 * @method static ReportMetric TARGETING_TEXT()
 * @method static ReportMetric TARGETING_TYPE()
 * @method static ReportMetric MATCH_TYPE()
 * @method static ReportMetric CURRENCY()
 * @method static ReportMetric ASIN()
 * @method static ReportMetric OTHER_ASIN()
 * @method static ReportMetric SKU()
 * @method static ReportMetric IMPRESSIONS()
 * @method static ReportMetric CLICKS()
 * @method static ReportMetric COST()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_1D()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_7D()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_14D()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_30D()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_1D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_7D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_14D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_CONVERSIONS_30D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_1D_OTHER_SKU()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_7D_OTHER_SKU()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_14D_OTHER_SKU()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_30D_OTHER_SKU()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_1D()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_7D()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_14D()
 * @method static ReportMetric ATTRIBUTED_UNITS_ORDERED_30D()
 * @method static ReportMetric ATTRIBUTED_SALES_1D()
 * @method static ReportMetric ATTRIBUTED_SALES_7D()
 * @method static ReportMetric ATTRIBUTED_SALES_14D()
 * @method static ReportMetric ATTRIBUTED_SALES_30D()
 * @method static ReportMetric ATTRIBUTED_SALES_1D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_SALES_7D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_SALES_14D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_SALES_30D_SAME_SKU()
 * @method static ReportMetric ATTRIBUTED_SALES_1D_OTHER_SKU()
 * @method static ReportMetric ATTRIBUTED_SALES_7D_OTHER_SKU()
 * @method static ReportMetric ATTRIBUTED_SALES_14D_OTHER_SKU()
 * @method static ReportMetric ATTRIBUTED_SALES_30D_OTHER_SKU()
 */
class ReportMetric extends Enum
{
    public const BID_PLUS = 'bidPlus';

    public const CAMPAIGN_NAME   = 'campaignName';
    public const CAMPAIGN_ID     = 'campaignId';
    public const CAMPAIGN_STATUS = 'campaignStatus';
    public const CAMPAIGN_BUDGET = 'campaignBudget';

    public const AD_GROUP_NAME = 'adGroupName';
    public const AD_GROUP_ID   = 'adGroupId';

    public const KEYWORD_ID   = 'keywordId';
    public const KEYWORD_TEXT = 'keywordText';

    public const PORTFOLIO_ID   = 'portfolioId';
    public const PORTFOLIO_NAME = 'portfolioName';

    public const TARGET_ID            = 'targetId';
    public const TARGETING_EXPRESSION = 'targetingExpression';
    public const TARGETING_TEXT       = 'targetingText';
    public const TARGETING_TYPE       = 'targetingType';

    public const MATCH_TYPE = 'matchType';
    public const CURRENCY   = 'currency';

    public const ASIN       = 'asin';
    public const OTHER_ASIN = 'otherAsin';
    public const SKU        = 'sku';

    public const IMPRESSIONS = 'impressions';
    public const CLICKS      = 'clicks';
    public const COST        = 'cost';

    public const ATTRIBUTED_CONVERSIONS_1D  = 'attributedConversions1d';
    public const ATTRIBUTED_CONVERSIONS_7D  = 'attributedConversions7d';
    public const ATTRIBUTED_CONVERSIONS_14D = 'attributedConversions14d';
    public const ATTRIBUTED_CONVERSIONS_30D = 'attributedConversions30d';

    public const ATTRIBUTED_CONVERSIONS_1D_SAME_SKU  = 'attributedConversions1dSameSKU';
    public const ATTRIBUTED_CONVERSIONS_7D_SAME_SKU  = 'attributedConversions7dSameSKU';
    public const ATTRIBUTED_CONVERSIONS_14D_SAME_SKU = 'attributedConversions14dSameSKU';
    public const ATTRIBUTED_CONVERSIONS_30D_SAME_SKU = 'attributedConversions30dSameSKU';

    public const ATTRIBUTED_UNITS_ORDERED_1D  = 'attributedUnitsOrdered1d';
    public const ATTRIBUTED_UNITS_ORDERED_7D  = 'attributedUnitsOrdered7d';
    public const ATTRIBUTED_UNITS_ORDERED_14D = 'attributedUnitsOrdered14d';
    public const ATTRIBUTED_UNITS_ORDERED_30D = 'attributedUnitsOrdered30d';

    public const ATTRIBUTED_UNITS_ORDERED_1D_OTHER_SKU  = 'attributedUnitsOrdered1dOtherSKU';
    public const ATTRIBUTED_UNITS_ORDERED_7D_OTHER_SKU  = 'attributedUnitsOrdered7dOtherSKU';
    public const ATTRIBUTED_UNITS_ORDERED_14D_OTHER_SKU = 'attributedUnitsOrdered14dOtherSKU';
    public const ATTRIBUTED_UNITS_ORDERED_30D_OTHER_SKU = 'attributedUnitsOrdered30dOtherSKU';

    public const ATTRIBUTED_SALES_1D  = 'attributedSales1d';
    public const ATTRIBUTED_SALES_7D  = 'attributedSales7d';
    public const ATTRIBUTED_SALES_14D = 'attributedSales14d';
    public const ATTRIBUTED_SALES_30D = 'attributedSales30d';

    public const ATTRIBUTED_SALES_1D_SAME_SKU  = 'attributedSales1dSameSKU';
    public const ATTRIBUTED_SALES_7D_SAME_SKU  = 'attributedSales7dSameSKU';
    public const ATTRIBUTED_SALES_14D_SAME_SKU = 'attributedSales14dSameSKU';
    public const ATTRIBUTED_SALES_30D_SAME_SKU = 'attributedSales30dSameSKU';

    public const ATTRIBUTED_SALES_1D_OTHER_SKU  = 'attributedSales1dOtherSKU';
    public const ATTRIBUTED_SALES_7D_OTHER_SKU  = 'attributedSales7dOtherSKU';
    public const ATTRIBUTED_SALES_14D_OTHER_SKU = 'attributedSales14dOtherSKU';
    public const ATTRIBUTED_SALES_30D_OTHER_SKU = 'attributedSales30dOtherSKU';


    public const ATTRIBUTE_BRANDED_SEARCHES_14D = 'attributedBrandedSearches14d';


    private const COMMON_FIELD = [
        self::BID_PLUS,
        self::CAMPAIGN_NAME,
        self::CAMPAIGN_ID,
        self::CAMPAIGN_STATUS,
        self::CAMPAIGN_BUDGET,
        self::AD_GROUP_NAME,
        self::AD_GROUP_ID,
        self::KEYWORD_ID,
        self::KEYWORD_TEXT,
        self::PORTFOLIO_ID,
        self::PORTFOLIO_NAME,
        self::TARGET_ID,
        self::TARGETING_EXPRESSION,
        self::TARGETING_TEXT,
        self::TARGETING_TYPE,
        self::MATCH_TYPE,
        self::CURRENCY,
        self::ASIN,
        self::OTHER_ASIN,
        self::SKU,
        self::IMPRESSIONS,
        self::CLICKS,
        self::COST,
        self::ATTRIBUTED_CONVERSIONS_1D,
        self::ATTRIBUTED_CONVERSIONS_7D,
        self::ATTRIBUTED_CONVERSIONS_14D,
        self::ATTRIBUTED_CONVERSIONS_30D,
        self::ATTRIBUTED_CONVERSIONS_1D_SAME_SKU,
        self::ATTRIBUTED_CONVERSIONS_7D_SAME_SKU,
        self::ATTRIBUTED_CONVERSIONS_14D_SAME_SKU,
        self::ATTRIBUTED_CONVERSIONS_30D_SAME_SKU,
        self::ATTRIBUTED_UNITS_ORDERED_1D,
        self::ATTRIBUTED_UNITS_ORDERED_7D,
        self::ATTRIBUTED_UNITS_ORDERED_14D,
        self::ATTRIBUTED_UNITS_ORDERED_30D,
        self::ATTRIBUTED_UNITS_ORDERED_1D_OTHER_SKU,
        self::ATTRIBUTED_UNITS_ORDERED_7D_OTHER_SKU,
        self::ATTRIBUTED_UNITS_ORDERED_14D_OTHER_SKU,
        self::ATTRIBUTED_UNITS_ORDERED_30D_OTHER_SKU,
        self::ATTRIBUTED_SALES_1D,
        self::ATTRIBUTED_SALES_7D,
        self::ATTRIBUTED_SALES_14D,
        self::ATTRIBUTED_SALES_30D,
        self::ATTRIBUTED_SALES_1D_SAME_SKU,
        self::ATTRIBUTED_SALES_7D_SAME_SKU,
        self::ATTRIBUTED_SALES_14D_SAME_SKU,
        self::ATTRIBUTED_SALES_30D_SAME_SKU,
        self::ATTRIBUTED_SALES_1D_OTHER_SKU,
        self::ATTRIBUTED_SALES_7D_OTHER_SKU,
        self::ATTRIBUTED_SALES_14D_OTHER_SKU,
        self::ATTRIBUTED_SALES_30D_OTHER_SKU,
        self::ATTRIBUTE_BRANDED_SEARCHES_14D,
        'attributedDetailPageView14d',
        'attributedDetailPageViewsClicks14d',
        'attributedKindleEditionNormalizedPagesRead14d',
        'attributedKindleEditionNormalizedPagesRoyalties14d',
        'attributedOrderRateNewToBrand14d',
        'attributedOrdersNewToBrand14d',
        'attributedOrdersNewToBrandPercentage14d',
        'attributedSalesNewToBrand14d',
        'attributedSalesNewToBrandPercentage14d',
        'attributedUnitsOrdered14dSameSKU',
        'attributedUnitsOrdered1dSameSKU',
        'attributedUnitsOrdered30dSameSKU',
        'attributedUnitsOrdered7dSameSKU',
        'attributedUnitsOrderedNewToBrand14d',
        'attributedUnitsOrderedNewToBrandPercentage14d',
        'dpv14d',
        'searchTermImpressionRank',
        'searchTermImpressionShare',
        'unitsSold14d',
        'vctr',
        'video5SecondViewRate',
        'video5SecondViews',
        'videoCompleteViews',
        'videoFirstQuartileViews',
        'videoMidpointViews',
        'videoThirdQuartileViews',
        'videoUnmutes',
        'viewableImpressions',
        'viewAttributedBrandedSearches14d',
        'viewAttributedConversions14d',
        'viewAttributedDetailPageView14d',
        'viewAttributedOrdersNewToBrand14d',
        'viewAttributedOrderRateNewToBrand14d',
        'viewAttributedSales14d',
        'viewAttributedSalesNewToBrand14d',
        'viewAttributedUnitsOrdered14d',
        'viewAttributedUnitsOrderedNewToBrand14d',
        'viewAttributedUnitsOrdered1dOtherSKU',
        'viewAttributedUnitsOrdered7dOtherSKU',
        'viewAttributedUnitsOrdered14dOtherSKU',
        'viewAttributedUnitsOrdered30dOtherSKU',
        'viewAttributedSales1dOtherSKU',
        'viewAttributedSales7dOtherSKU',
        'viewAttributedSales14dOtherSKU',
        'viewAttributedSales30dOtherSKU',
        'viewAttributedConversions1dOtherSKU',
        'viewAttributedConversions7dOtherSKU',
        'viewAttributedConversions14dOtherSKU',
        'viewAttributedConversions30dOtherSKU',
        'viewAttributedConversions1dOtherSKU',
        'attributedConversions7dOtherSKU',
        'attributedConversions14dOtherSKU',
        'attributedConversions30dOtherSKU',
        'viewImpressions',
        'vtr',
        'matchedTarget',
        'placement',
        'adId',
        'applicableBudgetRuleId',
        'applicableBudgetRuleName',
        'bidOptimization',
        'campaignBudgetType',
        'campaignRuleBasedBudget',
        'keywordBid',
        'keywordStatus',
        'keywordStatus',
    ];

    private const VALID_METRICS = [
        ReportRecordType::CAMPAIGNS   => self::COMMON_FIELD,
        ReportRecordType::AD_GROUPS   => self::COMMON_FIELD,
        ReportRecordType::PRODUCT_ADS => self::COMMON_FIELD,
        ReportRecordType::KEYWORDS    => self::COMMON_FIELD,
        ReportRecordType::TARGETS     => self::COMMON_FIELD,
        ReportRecordType::ASINS       => self::COMMON_FIELD,
    ];

    public function belongsTo(ReportRecordType $type): bool
    {
        return Arr::has(self::VALID_METRICS, $type->getValue())
               && \in_array($this->getValue(), self::VALID_METRICS[$type->getValue()]);
    }

    public static function isValidFor(ReportRecordType $type, string $value): bool
    {
        return self::isValid($value)
               && Arr::has(self::VALID_METRICS, $type->getValue())
               && \in_array($value, self::VALID_METRICS[$type->getValue()]);
    }

    public static function getValidMetricsFor(ReportRecordType $type): ?array
    {
        return Arr::has(self::VALID_METRICS, $type->getValue()) ? self::VALID_METRICS[$type->getValue()] : null;
    }
}
