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

use SimpleXMLElement;
use Wlfpanda1012\CtyunOosSdkPlus\Core\OosUtil;
use Wlfpanda1012\CtyunOosSdkPlus\Model\ObjectInfo;
use Wlfpanda1012\CtyunOosSdkPlus\Model\ObjectListInfo;
use Wlfpanda1012\CtyunOosSdkPlus\Model\Owner;
use Wlfpanda1012\CtyunOosSdkPlus\Model\PrefixInfo;

/**
 * Class ListObjectsResult.
 */
class ListObjectsResult extends Result
{
    /**
     * Parse the xml data returned by the ListObjects interface.
     *
     * return ObjectListInfo
     */
    protected function parseDataFromResponse()
    {
        $xml = new SimpleXMLElement($this->rawResponse->body);

        $encodingType = isset($xml->EncodingType) ? strval($xml->EncodingType) : '';

        $objectList = $this->parseObjectList($xml, $encodingType);
        $prefixList = $this->parsePrefixList($xml, $encodingType);

        $bucketName = isset($xml->Name) ? strval($xml->Name) : '';
        $prefix = isset($xml->Prefix) ? strval($xml->Prefix) : '';
        $prefix = OosUtil::decodeKey($prefix, $encodingType);

        $marker = isset($xml->Marker) ? strval($xml->Marker) : '';
        $marker = OosUtil::decodeKey($marker, $encodingType);

        $maxKeys = isset($xml->MaxKeys) ? intval($xml->MaxKeys) : 0;

        $delimiter = isset($xml->Delimiter) ? strval($xml->Delimiter) : '';
        $delimiter = OosUtil::decodeKey($delimiter, $encodingType);

        $isTruncated = isset($xml->IsTruncated) ? strval($xml->IsTruncated) : '';

        $nextMarker = isset($xml->NextMarker) ? strval($xml->NextMarker) : '';
        $nextMarker = OosUtil::decodeKey($nextMarker, $encodingType);

        return new ObjectListInfo(
            $bucketName,
            $prefix,
            $marker,
            $nextMarker,
            $maxKeys,
            $delimiter,
            $isTruncated,
            $objectList,
            $prefixList
        );
    }

    private function parseObjectList($xml, $encodingType)
    {
        $retList = [];
        if (isset($xml->Contents)) {
            foreach ($xml->Contents as $content) {
                $key = isset($content->Key) ? strval($content->Key) : '';
                $key = OosUtil::decodeKey($key, $encodingType);

                $lastModified = isset($content->LastModified) ? strval($content->LastModified) : '';

                $eTag = isset($content->ETag) ? strval($content->ETag) : '';

                $type = isset($content->Type) ? strval($content->Type) : '';

                $size = isset($content->Size) ? intval($content->Size) : 0;

                $storageClass = isset($content->StorageClass) ? strval($content->StorageClass) : '';

                $id = isset($content->Owner->ID) ? strval($content->Owner->ID) : '';

                $displayName = isset($content->Owner->DisplayName) ? strval($content->Owner->DisplayName) : '';

                $objectInfo = new ObjectInfo($key, $lastModified, $eTag, $type, $size, $storageClass);
                $objectInfo->setOwner(new Owner($id, $displayName));

                $retList[] = $objectInfo;
            }
        }
        return $retList;
    }

    private function parsePrefixList($xml, $encodingType)
    {
        $retList = [];
        if (isset($xml->CommonPrefixes)) {
            foreach ($xml->CommonPrefixes as $commonPrefix) {
                $prefix = isset($commonPrefix->Prefix) ? strval($commonPrefix->Prefix) : '';
                $prefix = OosUtil::decodeKey($prefix, $encodingType);
                $retList[] = new PrefixInfo($prefix);
            }
        }
        return $retList;
    }
}
