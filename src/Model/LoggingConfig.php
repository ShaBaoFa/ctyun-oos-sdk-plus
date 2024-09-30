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

use SimpleXMLElement;

/**
 * Class LoggingConfig.
 * @see http://help.ctyun.com/document_detail/oss/api-reference/bucket/PutBucketLogging.html
 */
class LoggingConfig implements XmlConfig
{
    private $targetBucket = '';

    private $targetPrefix = '';

    /**
     * LoggingConfig constructor.
     * @param null $targetBucket
     * @param null $targetPrefix
     */
    public function __construct($targetBucket = null, $targetPrefix = null)
    {
        $this->targetBucket = $targetBucket;
        $this->targetPrefix = $targetPrefix;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->serializeToXml();
    }

    public function parseFromXml($strXml)
    {
        $xml = simplexml_load_string($strXml);
        if (! isset($xml->LoggingEnabled)) {
            return;
        }
        foreach ($xml->LoggingEnabled as $status) {
            foreach ($status as $key => $value) {
                if ($key === 'TargetBucket') {
                    $this->targetBucket = strval($value);
                } elseif ($key === 'TargetPrefix') {
                    $this->targetPrefix = strval($value);
                }
            }
            break;
        }
    }

    /**
     *  Serialize to xml string.
     */
    public function serializeToXml()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><BucketLoggingStatus></BucketLoggingStatus>');
        if (isset($this->targetBucket, $this->targetPrefix)) {
            $loggingEnabled = $xml->addChild('LoggingEnabled');
            $loggingEnabled->addChild('TargetBucket', $this->targetBucket);
            $loggingEnabled->addChild('TargetPrefix', $this->targetPrefix);
        }
        return $xml->asXML();
    }

    /**
     * @return string
     */
    public function getTargetBucket()
    {
        return $this->targetBucket;
    }

    /**
     * @return string
     */
    public function getTargetPrefix()
    {
        return $this->targetPrefix;
    }
}
