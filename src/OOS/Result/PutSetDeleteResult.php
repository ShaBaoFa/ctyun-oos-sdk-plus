<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Result;


/**
 * Class PutSetDeleteResult
 * @package OOS\Result
 */
class PutSetDeleteResult extends Result
{
    /**
     * @return array()
     */
    protected function parseDataFromResponse()
    {
        $body = array('body' => $this->rawResponse->body);
        return array_merge($this->rawResponse->header, $body);
    }
}
