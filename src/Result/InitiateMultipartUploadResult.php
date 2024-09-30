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
use Wlfpanda1012\CtyunOosSdkPlus\Model\InitiateMultipartUploadInfo;

/**
 * Class initiateMultipartUploadResult.
 */
class InitiateMultipartUploadResult extends Result
{
    /**
     * Get uploadId in result and return.
     *
     * @return InitiateMultipartUploadInfo
     * @throws OosException
     */
    protected function parseDataFromResponse()
    {
        $strXml = $this->rawResponse->body;
        if (empty($strXml)) {
            throw new OosException('body is null');
        }

        $xml = simplexml_load_string($strXml);
        $initInfo = new InitiateMultipartUploadInfo();

        if (isset($xml->Bucket)) {
            $initInfo->setBucket(strval($xml->Bucket));
        }
        if (isset($xml->Key)) {
            $initInfo->setKey(strval($xml->Key));
        }
        if (isset($xml->UploadId)) {
            $initInfo->setUploadId(strval($xml->UploadId));
        }

        return $initInfo;
    }
}
