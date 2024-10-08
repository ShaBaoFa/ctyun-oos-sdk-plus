<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Result;


/**
 * Class DeleteObjectsResult
 * @package OOS\Result
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
        $objects = array();

        if (isset($xml->Deleted)) {
            foreach($xml->Deleted as $deleteKey)
                $objects[] = $deleteKey->Key;
        }
        return $objects;
    }
}
