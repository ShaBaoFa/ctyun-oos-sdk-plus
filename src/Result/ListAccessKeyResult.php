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
use Wlfpanda1012\CtyunOosSdkPlus\Model\KeyInfo;
use Wlfpanda1012\CtyunOosSdkPlus\Model\ListKeyInfo;

/**
 * Class ListBucketsResult.
 */
class ListAccessKeyResult extends Result
{
    /**
     * @return ListKeyInfo
     */
    protected function parseDataFromResponse()
    {
        $keyList = [];
        $IsTruncated = '';
        $Marker = '';
        $userName = '';
        $content = $this->rawResponse->body;
        $xml = new SimpleXMLElement($content);
        if (isset($xml->ListAccessKeysResult, $xml->ListAccessKeysResult->IsTruncated)) {
            $IsTruncated = strval($xml->ListAccessKeysResult->IsTruncated);
        }
        if (isset($xml->ListAccessKeysResult, $xml->ListAccessKeysResult->Marker)) {
            $Marker = strval($xml->ListAccessKeysResult->Marker);
        }
        if (isset($xml->ListAccessKeysResult, $xml->ListAccessKeysResult->UserName)) {
            $userName = strval($xml->ListAccessKeysResult->UserName);
        }

        if (isset($xml->ListAccessKeysResult, $xml->ListAccessKeysResult->AccessKeyMetadata, $xml->ListAccessKeysResult->AccessKeyMetadata->member)
        ) {
            foreach ($xml->ListAccessKeysResult->AccessKeyMetadata->member as $keyOne) {
                $keyInfo = new KeyInfo(
                    strval($keyOne->UserName),
                    strval($keyOne->AccessKeyId),
                    strval($keyOne->Status),
                    '',
                    strval($keyOne->IsPrimary)
                );
                $keyList[] = $keyInfo;
            }
        }
        $listKeyInfo = new ListKeyInfo($keyList, $IsTruncated, $Marker);
        $listKeyInfo->setUserName($userName);
        return $listKeyInfo;
    }
}
