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

/**
 * Class AppendResult.
 */
class AppendResult extends Result
{
    /**
     * Get the value of next-append-position from append's response headers.
     *
     * @return int
     * @throws OosException
     */
    protected function parseDataFromResponse()
    {
        $header = $this->rawResponse->header;
        if (isset($header['x-amz-next-append-position'])) {
            return intval($header['x-amz-next-append-position']);
        }
        throw new OosException('cannot get next-append-position');
    }
}
