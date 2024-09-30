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

class GetPolicyResult extends Result
{
    /**
     * @return string
     */
    public function parseDataFromResponse()
    {
        return $this->rawResponse->body;
    }
}
