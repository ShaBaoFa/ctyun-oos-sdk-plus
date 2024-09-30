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
 * Class CopyPartInfo.
 */
class CopyPartInfo
{
    private $lastModified = '';

    private $eTag = '';

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
}
