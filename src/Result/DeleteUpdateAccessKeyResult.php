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

use Wlfpanda1012\CtyunOosSdkPlus\Core\OosException;
use Wlfpanda1012\CtyunOosSdkPlus\Model\DeleteUpdateAccessKeyInfo;

/**
 * Class DeleteUpdateAccessKeyResult.
 */
class DeleteUpdateAccessKeyResult extends Result
{
    /**
     * @return DeleteUpdateAccessKeyInfo
     * @throws
     */
    public function parseDataFromResponse()
    {
        $strXml = $this->rawResponse->body;
        if (empty($strXml)) {
            throw new OosException('body is null');
        }

        $deleteUpdateAccessKeyInfo = new DeleteUpdateAccessKeyInfo();

        $xml = simplexml_load_string($strXml);
        $requestId = '';
        if (isset($xml->ResponseMetadata->RequestId)) {
            $requestId = strval($xml->ResponseMetadata->RequestId);
        }
        $deleteUpdateAccessKeyInfo->setRequestId($requestId);

        return $deleteUpdateAccessKeyInfo;
    }
}
