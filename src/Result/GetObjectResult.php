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

use Wlfpanda1012\CtyunOosSdkPlus\Model\GetObjectInfo;

/**
 * Class GetObjectResult.
 */
class GetObjectResult extends Result
{
    /**
     * Parse the xml data returned by the ListObjects interface.
     *
     * @return GetObjectInfo
     */
    public function parseDataFromResponse()
    {
        $getObectInfo = new GetObjectInfo();
        $rawResponseHeader = $this->rawResponse->header;

        $getObectInfo->setContent(empty($this->rawResponse->body) ? '' : $this->rawResponse->body);

        // Last-Modified
        $getObectInfo->setLastModified(isset($rawResponseHeader['last-modified']) ?
              $rawResponseHeader['last-modified'] : '');

        $getObectInfo->setETag(isset($rawResponseHeader['etag']) ?
             $rawResponseHeader['etag'] : '');

        $getObectInfo->setExpiration(isset($rawResponseHeader['x-amz-expiration']) ?
            $rawResponseHeader['x-amz-expiration'] : '');

        if (isset($rawResponseHeader['x-ctyun-metadata-location'])) {
            $getObectInfo->setMetaLocation($rawResponseHeader['x-ctyun-metadata-location']);
        }

        if (isset($rawResponseHeader['x-ctyun-data-location'])) {
            $getObectInfo->setDataLocation($rawResponseHeader['x-ctyun-data-location']);
        }

        return $getObectInfo;
    }
}
