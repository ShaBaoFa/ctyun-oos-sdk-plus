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
use Wlfpanda1012\CtyunOosSdkPlus\Model\CompleteMultipartUploadInfo;

/**
 * Class CompleteMultipartUploadResult.
 * @return CompleteMultipartUploadInfo
 */
class CompleteMultipartUploadResult extends Result
{
    /**
     * @return CompleteMultipartUploadInfo
     */
    protected function parseDataFromResponse()
    {
        $strXml = $this->rawResponse->body;
        if (empty($strXml)) {
            throw new OosException('body is null');
        }

        $xml = simplexml_load_string($strXml);
        $completeInfo = new CompleteMultipartUploadInfo();

        if (isset($xml->Bucket)) {
            $completeInfo->setBucket($xml->Bucket);
        }
        if (isset($xml->Key)) {
            $completeInfo->setKey($xml->Key);
        }
        if (isset($xml->Location)) {
            $completeInfo->setLocation($xml->Location);
        }
        if (isset($xml->Etag)) {
            $completeInfo->setEtag($xml->Etag);
        }
        return $completeInfo;
    }
}
