<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Concerns;

use GuzzleHttp\Exception\GuzzleException;
use PowerSrc\AmazonAdvertisingApi\Enums\HttpMethod;
use PowerSrc\AmazonAdvertisingApi\Enums\MimeType;
use PowerSrc\AmazonAdvertisingApi\Enums\ReportRecordType;
use PowerSrc\AmazonAdvertisingApi\Exceptions\ClassNotFoundException;
use PowerSrc\AmazonAdvertisingApi\Exceptions\HttpException;
use PowerSrc\AmazonAdvertisingApi\Models\ReportingReportResponse;
use PowerSrc\AmazonAdvertisingApi\Models\ReportResponse;
use PowerSrc\AmazonAdvertisingApi\Models\Reports\AdGroupReport;
use PowerSrc\AmazonAdvertisingApi\Models\Reports\AsinReport;
use PowerSrc\AmazonAdvertisingApi\Models\Reports\CampaignReport;
use PowerSrc\AmazonAdvertisingApi\Models\Reports\KeywordReport;
use PowerSrc\AmazonAdvertisingApi\Models\Reports\ProductAdReport;
use PowerSrc\AmazonAdvertisingApi\Models\Reports\TargetReport;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\AdGroupReportParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\AsinReportParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\CampaignReportParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\KeywordReportParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\ProductAdReportParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\ReportingReportParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\ReportParams;
use PowerSrc\AmazonAdvertisingApi\Models\RequestParams\TargetReportParams;
use Psr\Http\Message\ResponseInterface;
use ReflectionException;

trait MakesReportCalls
{
    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function requestReport(ReportRecordType $type, ReportParams $params): ReportResponse
    {
        $response = $this->operation(HttpMethod::POST(), $this->getApiUrl('sp/' . $type->getValue() . '/report'), $params);

        return new ReportResponse($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function getReport(string $reportId): ReportResponse
    {
        $response = $this->operation(HttpMethod::GET(), $this->getApiUrl('reports/' . $reportId));

        return new ReportResponse($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * Downloads the report file at location provided and returns
     * the decoded payload.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     *
     * @return mixed
     */
    public function downloadReport(string $location)
    {
        $response = $this->operation(HttpMethod::GET(), $location);

        return $this->decodeReport($response, $location);
    }

    /**
     * Returns a stream resource handler for location provided.
     *
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function getReportResponse(string $location): ResponseInterface
    {
        return $this->operation(HttpMethod::GET(), $location);
    }

    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function requestCampaignsReport(CampaignReportParams $params): ReportResponse
    {
        return $this->requestReport(ReportRecordType::CAMPAIGNS(), $params);
    }

    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function requestAdGroupsReport(AdGroupReportParams $params): ReportResponse
    {
        return $this->requestReport(ReportRecordType::AD_GROUPS(), $params);
    }

    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function requestProductAdsReport(ProductAdReportParams $params): ReportResponse
    {
        return $this->requestReport(ReportRecordType::PRODUCT_ADS(), $params);
    }

    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function requestKeywordsReport(KeywordReportParams $params): ReportResponse
    {
        return $this->requestReport(ReportRecordType::KEYWORDS(), $params);
    }

    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function requestTargetsReport(TargetReportParams $params): ReportResponse
    {
        return $this->requestReport(ReportRecordType::TARGETS(), $params);
    }

    /**
     * @throws ClassNotFoundException
     * @throws HttpException
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function requestAsinsReport(AsinReportParams $params): ReportResponse
    {
        return $this->requestReport(ReportRecordType::ASINS(), $params);
    }

    /**
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function downloadCampaignsReport(string $location): CampaignReport
    {
        return new CampaignReport($this->downloadReport($location));
    }

    /**
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function downloadAdGroupsReport(string $location): AdGroupReport
    {
        return new AdGroupReport($this->downloadReport($location));
    }

    /**
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function downloadAsinsReport(string $location): AsinReport
    {
        return new AsinReport($this->downloadReport($location));
    }

    /**
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function downloadKeywordsReport(string $location): KeywordReport
    {
        return new KeywordReport($this->downloadReport($location));
    }

    /**
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function downloadProductAdsReport(string $location): ProductAdReport
    {
        return new ProductAdReport($this->downloadReport($location));
    }

    /**
     * @throws ClassNotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function downloadTargetsReport(string $location): TargetReport
    {
        return new TargetReport($this->downloadReport($location));
    }
    /**
     * v3 请求报告
     * @param ReportingReportParams $params
     * [
     *      name: string,
     *      startDate: string,
     *      endDate: string,
     *      configuration: [
     *          adProduct:string, // 报告商品
     *          groupBy: array, // 分组
     *          columns: array, // 查询字段
     *          reportTypeId: string , // 报告类型id
     *          timeUnit: string, // 返回类型 DAILY:每天 SUMMARY:概括
     *          format: string, // 格式
     *      ]
     * ]
     *
     * @return ReportResponse
     * @description
     * @author Bosh
     * @throws
     * @since 2023-02-10
     */
    public function requestReportingReport(ReportingReportParams $params): ReportingReportResponse
    {
        $this->contentType = 'application/vnd.createasyncreportrequest.v3+json';
        $response = $this->operation(HttpMethod::POST(), $this->getApiUrl('reporting/reports'), $params);
        return new ReportingReportResponse($this->decodeResponseBody($response, MimeType::JSON()));
    }

    /**
     * v3 获取报告
     * @param string $reportId
     * @description
     * @author Bosh
     * @throws
     * @since 2023-02-10
     */
    public function getReportingReport(string $reportId) : ReportingReportResponse
    {
        $this->contentType = 'application/vnd.createasyncreportrequest.v3+json';
        $response = $this->operation(HttpMethod::POST(), $this->getApiUrl( sprintf('reporting/reports/%s', $reportId)));
        return new ReportingReportResponse($this->decodeResponseBody($response, MimeType::JSON()));
    }
}
