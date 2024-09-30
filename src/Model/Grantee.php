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

class Grantee
{
    private $uri = '';

    private $permission = '';

    public function __construct($uri, $permission)
    {
        $this->uri = $uri;
        $this->permission = $permission;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getPermission()
    {
        return $this->permission;
    }
}
