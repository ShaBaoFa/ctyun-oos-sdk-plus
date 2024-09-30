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
 * Class UploadInfo.
 *
 * The return value of ListMultipartUpload
 */
class UploadInfo
{
    private $key = '';

    private $uploadId = '';

    private $initiated = '';

    private $storageClass = '';

    private $initiator;

    private $owner;

    /**
     * UploadInfo constructor.
     *
     * @param string $key
     * @param string $uploadId
     * @param string $initiated
     */
    public function __construct($key, $uploadId, $initiated)
    {
        $this->key = $key;
        $this->uploadId = $uploadId;
        $this->initiated = $initiated;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getUploadId()
    {
        return $this->uploadId;
    }

    /**
     * @return string
     */
    public function getInitiated()
    {
        return $this->initiated;
    }

    public function setStorageClass($storageClass)
    {
        $this->storageClass = $storageClass;
    }

    /**
     * @return string
     */
    public function getStorageClass()
    {
        return $this->storageClass;
    }

    /**
     * @param  Initiator
     * @param mixed $initiator
     */
    public function setInitiator($initiator)
    {
        $this->initiator = $initiator;
    }

    /**
     * @return Initiator
     */
    public function getInitiator()
    {
        return $this->initiator;
    }

    /**
     * @param  Owner
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
