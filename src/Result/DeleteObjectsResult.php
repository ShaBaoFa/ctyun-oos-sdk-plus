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

/**
 * Class DeleteObjectsResult.
 */
class DeleteObjectsResult extends Result
{
    /**
     * @return array()
     */
    protected function parseDataFromResponse()
    {
        $body = $this->rawResponse->body;
        $xml = simplexml_load_string($body);
        $objects = [];

        if (isset($xml->Deleted)) {
            foreach ($xml->Deleted as $deleteKey) {
                $objects[] = $deleteKey->Key;
            }
        }
        return $objects;
    }
}
