<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Result;

use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\CorsConfig;

class GetCorsResult extends Result
{
    /**
     * @return CorsConfig
     * @throws
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $config = new CorsConfig();
        $config->parseFromXml($content);
        return $config;
    }

}