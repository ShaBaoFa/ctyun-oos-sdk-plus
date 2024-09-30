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
use Wlfpanda1012\CtyunOosSdkPlus\Model\BucketRegion;

/**
 * The type of the return value of getRegions, it wraps the data parsed from xml.
 */
class RegionsResult extends Result
{
    /**
     * @return BucketRegion
     * @throws OosException
     */
    protected function parseDataFromResponse()
    {
        $strXml = $this->rawResponse->body;
        if (empty($strXml)) {
            throw new OosException('body is null');
        }

        $bucketRegion = new BucketRegion();

        $xml = simplexml_load_string($strXml);

        $metaRegions = [];
        $dataRegions = [];
        foreach ($xml->MetadataRegions->Region as $key => $metaRegion) {
            $metaRegions[] = strval($metaRegion);
        }

        foreach ($xml->DataRegions->Region as $key => $datRegion) {
            $dataRegions[] = strval($datRegion);
        }
        $bucketRegion->setMetaRegions($metaRegions);
        $bucketRegion->setDataRegions($dataRegions);
        return $bucketRegion;
    }
}
