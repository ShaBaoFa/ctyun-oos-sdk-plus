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

/**
 * Class ListBucketsResult.
 */
class CreateAccessKeyResult extends Result
{
    /**
     * @return KeyInfo
     */
    protected function parseDataFromResponse()
    {
        $keyInfo = new KeyInfo('', '', '', '', '');
        $content = $this->rawResponse->body;
        $xml = new SimpleXMLElement($content);
        if (isset($xml->CreateAccessKeyResult, $xml->CreateAccessKeyResult->AccessKey)
        ) {
            $keyInfo = new KeyInfo(
                strval($xml->CreateAccessKeyResult->AccessKey->UserName),
                strval($xml->CreateAccessKeyResult->AccessKey->AccessKeyId),
                strval($xml->CreateAccessKeyResult->AccessKey->Status),
                strval($xml->CreateAccessKeyResult->AccessKey->SecretAccessKey),
                strval($xml->CreateAccessKeyResult->AccessKey->IsPrimary)
            );
        }
        return $keyInfo;
    }
}
