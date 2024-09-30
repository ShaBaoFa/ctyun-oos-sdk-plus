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

class MetadataLocationConstraint
{
    private $location;

    public function __construct($location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }
}
