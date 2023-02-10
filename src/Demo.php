<?php
namespace PowerSrc\AmazonAdvertisingApi;

use PowerSrc\AmazonAdvertisingApi\Enums\RegionCode;

$config = new Config(new \PowerSrc\AmazonAdvertisingApi\Components\HttpAuthManager(new \GuzzleHttp\Client, $clientId, $clientSecret, $refreshToken, $accessToken, $validTill), new \PowerSrc\AmazonAdvertisingApi\Enums\RegionCode(RegionCode::NORTH_AMERICA()));
$config = $config->setApiVersion(''); // v3版本调用此方法
$amazonAdvertisingApiClient = new Client($config, $client, $profileId);
$reportResponse = $amazonAdvertisingApiClient->getReportingReport($reportId);
var_dump($reportResponse);

?>