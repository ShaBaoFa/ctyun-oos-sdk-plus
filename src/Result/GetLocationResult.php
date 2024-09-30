<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Wlfpanda1012\CtyunOosSdkPlus\Result;

use Wlfpanda1012\CtyunOosSdkPlus\Core\OosException;
use Wlfpanda1012\CtyunOosSdkPlus\Model\BucketDetailInfo;
use Wlfpanda1012\CtyunOosSdkPlus\Model\DataLocation;
use Wlfpanda1012\CtyunOosSdkPlus\Model\MetadataLocationConstraint;

/**
 * Class GetLocationResult getBucketLocation interface returns the result class, encapsulated
 * The returned xml data is parsed.
 */
class GetLocationResult extends Result
{
    /**
     * Parse data from response.
     *
     * @throws
     */
    public function parseDataFromResponse(): BucketDetailInfo
    {
        $strXml = $this->rawResponse->body;
        if (empty($strXml)) {
            throw new OosException('body is null');
        }

        $bucketDetailInfo = new BucketDetailInfo();
        $xml = simplexml_load_string($strXml);
        $metaLocation = $xml->MetadataLocationConstraint->Location;
        $metadataLocationConstraint = new MetadataLocationConstraint($metaLocation);
        $bucketDetailInfo->setMetaLocation($metadataLocationConstraint);

        $type = 'Local';
        if (isset($xml->DataLocationConstraint->Type)) {
            $type = $xml->DataLocationConstraint->Type;
        }

        $locationList = [];
        if (isset($xml->DataLocationConstraint->LocationList)) {
            foreach ($xml->DataLocationConstraint->LocationList->Location as $key => $datLocation) {
                $locationList[] = strval($datLocation);
            }
        }

        $scheduleStrategy = 'Allowed';
        if (isset($xml->DataLocationConstraint->ScheduleStrategy)) {
            $scheduleStrategy = $xml->DataLocationConstraint->ScheduleStrategy;
        }

        $dataLocationConstraint = new DataLocation($type, $locationList, $scheduleStrategy);

        $bucketDetailInfo->setDataLocation($dataLocationConstraint);

        return $bucketDetailInfo;
    }
}
