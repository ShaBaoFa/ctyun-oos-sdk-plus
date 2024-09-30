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
use Wlfpanda1012\CtyunOosSdkPlus\Model\BucketInfo;
use Wlfpanda1012\CtyunOosSdkPlus\Model\BucketListInfo;
use Wlfpanda1012\CtyunOosSdkPlus\Model\Owner;

/**
 * Class ListBucketsResult.
 */
class ListBucketsResult extends Result
{
    /**
     * @return BucketListInfo
     */
    protected function parseDataFromResponse()
    {
        $strXml = $this->rawResponse->body;
        if (empty($strXml)) {
            throw new OosException('body is null');
        }
        $xml = simplexml_load_string($strXml);

        $bucketListInfo = new BucketListInfo();
        $bucketList = [];
        if (isset($xml->Buckets, $xml->Buckets->Bucket)) {
            foreach ($xml->Buckets->Bucket as $bucket) {
                $bucketInfo = new BucketInfo(
                    strval($bucket->Location),
                    strval($bucket->Name),
                    strval($bucket->CreationDate)
                );
                $bucketList[] = $bucketInfo;
            }
        }
        $id = '';
        $displayName = '';
        if (isset($xml->Owner, $xml->Owner->ID)) {
            $id = strval($xml->Owner->ID);
        }
        if (isset($xml->Owner, $xml->Owner->DisplayName)) {
            $displayName = strval($xml->Owner->DisplayName);
        }

        $owner = new Owner($id, $displayName);

        $bucketListInfo->setBucketList($bucketList);
        $bucketListInfo->setOwner($owner);

        return $bucketListInfo;
    }
}
