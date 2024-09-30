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
 * Class UploadPartResult.
 */
class UploadPartResult extends Result
{
    /**
     * 结果中part的ETag.
     *
     * @return string
     * @throws OosException
     */
    protected function parseDataFromResponse()
    {
        $header = $this->rawResponse->header;
        if (isset($header['etag'])) {
            return $header['etag'];
        }
        throw new OosException('cannot get ETag');
    }
}
