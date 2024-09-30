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
 * Class GetObjectInfo.
 */
class GetObjectInfo
{
    private $lastModified = '';

    private $eTag = '';

    private $content = '';

    private $metaLocation = '';

    private $dataLocation = '';

    private $expiration = '';

    /**
     * GetObjectInfo constructor.
     */
    public function __construct() {}

    /**
     * @return string
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    public function setLastModified($lastModified)
    {
        return $this->lastModified = $lastModified;
    }

    /**
     * @return string
     */
    public function getETag()
    {
        return $this->eTag;
    }

    public function setETag($eTag)
    {
        return $this->eTag = $eTag;
    }

    public function getSize()
    {
        return strlen($this->content);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        return $this->content = $content;
    }

    public function getMetaLocation()
    {
        return $this->metaLocation;
    }

    public function setMetaLocation($metaLocation)
    {
        return $this->metaLocation = $metaLocation;
    }

    public function getExpiration()
    {
        return $this->expiration;
    }

    public function setExpiration($expiration)
    {
        return $this->expiration = $expiration;
    }

    public function getDataLocation()
    {
        return $this->dataLocation;
    }

    public function setDataLocation($dataLocation)
    {
        return $this->dataLocation = $dataLocation;
    }
}
