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

use Wlfpanda1012\CtyunOosSdkPlus\Model\AccelerateConfig;

/**
 * Class GetAccelerateResult.
 */
class GetAccelerateResult extends Result
{
    /**
     * Parse AccelerateConfig data.
     *
     * @return AccelerateConfig
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $config = new AccelerateConfig();
        $config->parseFromXml($content);
        return $config;
    }
}
