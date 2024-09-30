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
 * Class ListKeyInfo.
 *
 * It's the type of return value of ListKeyInfo.
 */
class ListKeyInfo
{
    private $keyList = [];

    private $isTruncated = '';

    private $marker = '';

    private $userName = '';

    private $status = '';

    /**
     * BucketListInfo constructor.
     * @param string $IsTruncated
     * @param string $Marker
     */
    public function __construct(array $KeyList, $IsTruncated, $Marker)
    {
        $this->keyList = $KeyList;
        $this->isTruncated = $IsTruncated;
        $this->marker = $Marker;
    }

    /**
     * Get the IsTruncated.
     *
     * @return string
     */
    public function getIsTruncated()
    {
        return $this->isTruncated;
    }

    /**
     * Get the Marker.
     *
     * @return string
     */
    public function getMarker()
    {
        return $this->marker;
    }

    /**
     * Get the BucketInfo list.
     *
     * @return KeyInfo[]
     */
    public function getKeyList()
    {
        return $this->keyList;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
}
