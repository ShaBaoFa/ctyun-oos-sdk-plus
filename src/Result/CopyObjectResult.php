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
use Wlfpanda1012\CtyunOosSdkPlus\Model\CopyPartInfo;

/**
 * Class CopyObjectResult.
 * @return CopyPartInfo
 */
class CopyObjectResult extends Result
{
    /**
     * @return CopyPartInfo
     */
    protected function parseDataFromResponse()
    {
        $strXml = $this->rawResponse->body;
        if (empty($strXml)) {
            throw new OosException('body is null');
        }

        $xml = simplexml_load_string($strXml);
        $partInfo = new CopyPartInfo();

        if (isset($xml->LastModified)) {
            $partInfo->setLastModified($xml->LastModified);
        }
        if (isset($xml->ETag)) {
            $partInfo->setETag($xml->ETag);
        }
        return $partInfo;
    }
}
