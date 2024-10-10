<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Result;

use Wlfpanda1012\CtyunOosSdkPlus\OOS\Core\OosUtil;
use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\GetObjectInfo;
use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\ObjectInfo;
use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\ObjectListInfo;
use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\PrefixInfo;

/**
 * Class GetObjectResult
 * @package OOS\Result
 */
class GetObjectResult extends Result
{
    /**
     * Parse the xml data returned by the ListObjects interface
     *
     * @return GetObjectInfo
     */

    public function parseDataFromResponse()
    {
        $getObectInfo = new GetObjectInfo();
        $rawResponseHeader = $this->rawResponse->header;
        
        $getObectInfo->setContent(empty($this->rawResponse->body) ? "" : $this->rawResponse->body);

        //Last-Modified
        $getObectInfo->setLastModified(isset($rawResponseHeader["last-modified"]) ?
              $rawResponseHeader["last-modified"] : "") ;

        $getObectInfo->setETag(isset($rawResponseHeader["etag"]) ?
             $rawResponseHeader["etag"] : "");

        $getObectInfo->setExpiration(isset($rawResponseHeader["x-amz-expiration"]) ?
            $rawResponseHeader["x-amz-expiration"] : "");

        if(isset($rawResponseHeader["x-ctyun-metadata-location"]))
        {
            $getObectInfo->setMetaLocation($rawResponseHeader["x-ctyun-metadata-location"]);
        }

        if(isset($rawResponseHeader["x-ctyun-data-location"]))
        {
            $getObectInfo->setDataLocation($rawResponseHeader["x-ctyun-data-location"]);
        }

        return $getObectInfo;
    }
}