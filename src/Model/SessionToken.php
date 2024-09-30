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
 * @property string $SessionToken
 * @property string $AccessKeyId
 * @property string $SecretAccessKey
 * @property string $Expiration
 */
class SessionToken
{
    public function __construct(string $AccessKeyId, string $SecretAccessKey, string $SessionToken, string $Expiration)
    {
        $this->AccessKeyId = $AccessKeyId;
        $this->SecretAccessKey = $SecretAccessKey;
        $this->SessionToken = $SessionToken;
        $this->Expiration = $Expiration;
    }

    public function getAccessKeyId(): string
    {
        return $this->AccessKeyId;
    }

    public function setAccessKeyId(string $AccessKeyId): void
    {
        $this->AccessKeyId = $AccessKeyId;
    }

    public function getSecretAccessKey(): string
    {
        return $this->SecretAccessKey;
    }

    public function setSecretAccessKey(string $SecretAccessKey): void
    {
        $this->SecretAccessKey = $SecretAccessKey;
    }

    public function getExpiration(): string
    {
        return $this->Expiration;
    }

    public function setExpiration(string $Expiration): void
    {
        $this->Expiration = $Expiration;
    }

    public function getSessionToken(): string
    {
        return $this->SessionToken;
    }

    public function setSessionToken(string $SessionToken): void
    {
        $this->SessionToken = $SessionToken;
    }
}
