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

namespace Wlfpanda1012\CtyunOosSdkPlus\Model;

/**
 * Bucket information class. This is the type of element in BucketListInfo's.
 *
 * Class BucketInfo
 */
class DeleteUpdateAccessKeyInfo
{
    /**
     * RequestId.
     *
     * @var string
     */
    private $requestId;

    /**
     * DeleteUpdateAccessKeyInfo constructor.
     */
    public function __construct() {}

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }
}
