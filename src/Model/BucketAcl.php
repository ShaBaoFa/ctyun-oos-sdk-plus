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
 * Class BucketAcl.
 */
class BucketAcl
{
    private $owner;

    private $granteeList;

    public function __construct($owner, $granteeList)
    {
        $this->owner = $owner;
        $this->granteeList = $granteeList;
    }

    /**
     * @return Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return Grantee[]
     */
    public function getGranteeList()
    {
        return $this->granteeList;
    }
}
