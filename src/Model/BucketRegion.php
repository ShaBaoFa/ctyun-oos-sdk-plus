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

class BucketRegion
{
    private $metaRegions;

    private $dataRegions;

    public function __construct()
    {
        $this->metaRegions = [];
        $this->dataRegions = [];
    }

    /**
     * @return array
     */
    public function getMetaRegions()
    {
        return $this->metaRegions;
    }

    public function setMetaRegions($metaRegions)
    {
        $this->metaRegions = $metaRegions;
    }

    /**
     * @return array
     */
    public function getDataRegions()
    {
        return $this->dataRegions;
    }

    public function setDataRegions($dataRegions)
    {
        $this->dataRegions = $dataRegions;
    }
}
