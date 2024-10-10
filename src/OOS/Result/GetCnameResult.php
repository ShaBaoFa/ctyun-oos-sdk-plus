<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Result;

use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\CnameConfig;

class GetCnameResult extends Result
{
    /**
     * @return CnameConfig
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $config = new CnameConfig();
        $config->parseFromXml($content);
        return $config;
    }
}