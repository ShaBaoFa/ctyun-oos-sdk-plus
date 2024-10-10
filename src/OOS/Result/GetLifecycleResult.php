<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Result;


use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\LifecycleConfig;

/**
 * Class GetLifecycleResult
 * @package OOS\Result
 */
class GetLifecycleResult extends Result
{
    /**
     *  Parse the LifecycleConfig object from the response
     *
     * @return LifecycleConfig
     * @throws
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $config = new LifecycleConfig();
        $config->parseFromXml($content);
        return $config;
    }

}
