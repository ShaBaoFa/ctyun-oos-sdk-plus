<?php

namespace Wlfpanda1012\CtyunOosSdkPlus\OOS\Result;

use Wlfpanda1012\CtyunOosSdkPlus\OOS\Model\SessionToken;

class GetSessionTokenResult extends Result
{
    /**
     * @return mixed
     */
    protected function parseDataFromResponse()
    {
        $keyInfo = new SessionToken("","","","");
        $content = $this->rawResponse->body;
        $xml = new \SimpleXMLElement($content);
        if (isset($xml->GetSessionTokenResult)
            && isset($xml->GetSessionTokenResult->Credentials)
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
