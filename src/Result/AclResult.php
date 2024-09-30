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
use Wlfpanda1012\CtyunOosSdkPlus\Model\BucketAcl;
use Wlfpanda1012\CtyunOosSdkPlus\Model\Grantee;
use Wlfpanda1012\CtyunOosSdkPlus\Model\Owner;

/**
 * The type of the return value of getBucketAcl, it wraps the data parsed from xml.
 */
class AclResult extends Result
{
    /**
     * @return BucketAcl
     * @throws OosException
     */
    public function parseDataFromResponse()
    {
        $granteeList = [];

        $content = $this->rawResponse->body;
        $xml = simplexml_load_string($content);

        if (empty($content)) {
            throw new OosException('body is null');
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

        if (isset($xml->AccessControlList->Grant)) {
            $grantListInfo = $xml->AccessControlList->Grant;

            foreach ($grantListInfo as $grantInfo) {
                $grantee = new Grantee(
                    strval($grantInfo->Grantee->URI),
                    strval($grantInfo->Permission)
                );
                $granteeList[] = $grantee;
            }
        }

        return new BucketAcl($owner, $granteeList);
    }
}
