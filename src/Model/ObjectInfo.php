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
 * Class ObjectInfo.
 *
 * The element type of ObjectListInfo, which is the return value type of listObjects
 *
 * The return value of listObjects includes two arrays
 * One is the returned ObjectListInfo, which is similar to a file list in a file system.
 * The other is the returned prefix list, which is similar to a folder list in a file system.
 */
class ObjectInfo
{
    private $key = '';

    private $lastModified = '';

    private $eTag = '';

    private $type = '';

    private $size = 0;

    private $storageClass = '';

    private $amzExpiration = '';

    private $owner;

    /**
     * ObjectInfo constructor.
     *
     * @param string $key
     * @param string $lastModified
     * @param string $eTag
     * @param string $type
     * @param int $size
     * @param string $storageClass
     */
    public function __construct($key, $lastModified, $eTag, $type, $size, $storageClass)
    {
        $this->key = $key;
        $this->lastModified = $lastModified;
        $this->eTag = $eTag;
        $this->type = $type;
        $this->size = $size;
        $this->storageClass = $storageClass;

        $this->owner = new Owner('', '');
    }

    /**
     * set Owner.
     * @param Owner
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * set Owner.
     * @return Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function setAmzexpiration($amzExpiration)
    {
        $this->amzExpiration = $amzExpiration;
    }

    public function getAmzexpiration($amzExpiration)
    {
        return $this->amzExpiration;
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
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @return string
     */
    public function getETag()
    {
        return $this->eTag;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getStorageClass()
    {
        return $this->storageClass;
    }
}
