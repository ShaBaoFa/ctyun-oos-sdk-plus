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

namespace Wlfpanda1012\CtyunOosSdkPlus\Core;

use Exception;

/**
 * Class OosException.
 *
 * This is the class that OSSClient is expected to thrown, which the caller needs to handle properly.
 * It has the OOS specific errors which is useful for troubleshooting.
 */
class OosException extends Exception
{
    private $details = [];

    public function __construct($details)
    {
        if (is_array($details)) {
            $message = $details['code'] . ': ' . $details['message']
                     . ' RequestId: ' . $details['request-id'];
            parent::__construct($message);
            $this->details = $details;
        } else {
            $message = $details;
            $this->details['message'] = $details;
            parent::__construct($message);
        }
    }

    public function getHTTPStatus()
    {
        return isset($this->details['status']) ? $this->details['status'] : '';
    }

    public function getRequestId()
    {
        return isset($this->details['request-id']) ? $this->details['request-id'] : '';
    }

    public function getErrorCode()
    {
        return isset($this->details['code']) ? $this->details['code'] : '';
    }

    public function getErrorMessage()
    {
        return isset($this->details['message']) ? $this->details['message'] : '';
    }

    public function getDetails()
    {
        return isset($this->details['body']) ? $this->details['body'] : '';
    }

    public function printException($funcName)
    {
        echo $funcName . ": FAILED\n";
        echo 'Status: ' . $this->getHTTPStatus() . "\n";
        echo 'Request-id: ' . $this->getRequestId() . "\n";
        echo 'Code: ' . $this->getErrorCode() . "\n";
        echo 'Message: ' . $this->getErrorMessage() . "\n";
        echo 'Details: ' . $this->getDetails() . "\n\n";
    }
}
