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

class InitiateMultipartUploadInfo
{
    private $bucket;

    private $key;

    private $uploadId;

    public function __construct() {}

    public function getBucket()
    {
        return $this->bucket;
    }

    public function setBucket($bucket)
    {
        $this->bucket = $bucket;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getUploadId()
    {
        return $this->uploadId;
    }

    public function setUploadId($uploadId)
    {
        $this->uploadId = $uploadId;
    }
}
