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

namespace Wlfpanda1012\CtyunOosSdkPlus\Result;

use SimpleXMLElement;
use Wlfpanda1012\CtyunOosSdkPlus\Model\SessionToken;

class GetSessionTokenResult extends Result
{
    protected function parseDataFromResponse(): mixed
    {
        $keyInfo = new SessionToken('', '', '', '');
        $content = $this->rawResponse->body;
        $xml = new SimpleXMLElement($content);
        if (isset($xml->GetSessionTokenResult, $xml->GetSessionTokenResult->Credentials)
        ) {
            $sessionToken = new SessionToken(
                strval($xml->GetSessionTokenResult->Credentials->AccessKeyId),
                strval($xml->GetSessionTokenResult->Credentials->SecretAccessKey),
                strval($xml->GetSessionTokenResult->Credentials->SessionToken),
                strval($xml->GetSessionTokenResult->Credentials->Expiration),
            );
        }
        return $sessionToken;
    }
}
