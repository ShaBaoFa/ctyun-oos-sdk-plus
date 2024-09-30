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
 * Class BucketListInfo.
 *
 * It's the type of return value of ListBuckets.
 */
class BucketListInfo
{
    /**
     * BucketInfo list.
     *
     * @var array
     */
    private $bucketList = [];

    /**
     * BucketInfo list.
     *
     * @var Owner
     */
    private $owner;

    /**
     * BucketListInfo constructor.
     */
    public function __construct() {}

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

    /**
     * set the BucketInfo list.
     *
     * @param BucketInfo[] $bucketList
     */
    public function setBucketList($bucketList)
    {
        $this->bucketList = $bucketList;
    }

    /**
     * Get the BucketInfo list.
     *
     * @return BucketInfo[]
     */
    public function getBucketList()
    {
        return $this->bucketList;
    }
}
