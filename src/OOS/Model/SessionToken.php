<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Model;

/**
 * @property string $SessionToken
 * @property string $AccessKeyId
 * @property string $SecretAccessKey
 * @property string $Expiration
 */
class SessionToken
{
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
    public function __construct(string $AccessKeyId,string $SecretAccessKey,string $SessionToken,string $Expiration)
    {
        $this->AccessKeyId = $AccessKeyId;
        $this->SecretAccessKey = $SecretAccessKey;
        $this->SessionToken = $SessionToken;
        $this->Expiration = $Expiration;
    }
}
