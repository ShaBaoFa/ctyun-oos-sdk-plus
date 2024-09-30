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

use Wlfpanda1012\CtyunOosSdkPlus\Model\ObjectInfo;

/**
 * Class HeaderObjectResult.
 */
class HeaderObjectResult extends Result
{
    /**
     * The returned ResponseCore header is used as the return data.
     *
     * @return ObjectInfo
     */
    protected function parseDataFromResponse()
    {
        $headers = empty($this->rawResponse->header) ? [] : $this->rawResponse->header;
        $key = '';
        $lastModified = isset($headers['last-modified']) ? $headers['last-modified'] : '';
        $eTag = isset($headers['etag']) ? $headers['etag'] : '';
        $type = isset($headers['content-type']) ? $headers['content-type'] : '';
        $size = isset($headers['content-length']) ? $headers['content-length'] : '';
        $storageClass = '';
        $amzExpiration = isset($headers['x-amz-expiration']) ? $headers['x-amz-expiration'] : '';

        $objectInfo = new ObjectInfo($key, $lastModified, $eTag, $type, $size, $storageClass);
        $objectInfo->setAmzexpiration($amzExpiration);
        return $objectInfo;
    }
}
