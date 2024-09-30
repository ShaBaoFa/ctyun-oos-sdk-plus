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
use Wlfpanda1012\CtyunOosSdkPlus\Core\OosException;

/**
 * Class BucketLifecycleConfig.
 * @see http://help.ctyun.com/document_detail/oss/api-reference/bucket/PutBucketLifecycle.html
 */
class LifecycleConfig implements XmlConfig
{
    /**
     * @var LifecycleRule[]
     */
    private $rules;

    /**
     *  Serialize the object into xml string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->serializeToXml();
    }

    /**
     * Parse the xml into this object.
     *
     * @param string $strXml
     * @return LifecycleConfig
     * @throws OosException
     */
    public function parseFromXml($strXml)
    {
        $this->rules = [];
        $xml = simplexml_load_string($strXml);
        if (! isset($xml->Rule)) {
            return;
        }
        $this->rules = [];
        foreach ($xml->Rule as $rule) {
            $id = strval($rule->ID);
            $prefix = strval($rule->Prefix);
            $status = strval($rule->Status);
            $actions = [];
            // <Expiration>
            //  <Days>30</Days>| <Date>2002-10-11T00:00:00.000Z</Date>
            // </Expiration>

            foreach ($rule as $key => $value) {
                if ($key === 'ID' || $key === 'Prefix' || $key === 'Status') {
                    continue;
                }
                $action = $key;
                $timeSpec = null;
                $timeValue = null;
                foreach ($value as $timeSpecKey => $timeValueValue) {
                    $timeSpec = $timeSpecKey;
                    $timeValue = strval($timeValueValue);
                }
                $actions[] = new LifecycleAction($action, $timeSpec, $timeValue);
            }
            $this->rules[] = new LifecycleRule($id, $prefix, $status, $actions);
        }
        return $this;
    }

    /**
     * Serialize the object to xml.
     *
     * @return string
     */
    public function serializeToXml()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><LifecycleConfiguration></LifecycleConfiguration>');
        foreach ($this->rules as $rule) {
            $xmlRule = $xml->addChild('Rule');
            $rule->appendToXml($xmlRule);
        }
        return $xml->asXML();
    }

    /**
     * Add a LifecycleRule.
     *
     * @param LifecycleRule $lifecycleRule
     * @throws OosException
     */
    public function addRule($lifecycleRule)
    {
        if (! isset($lifecycleRule)) {
            throw new OosException('lifecycleRule is null');
        }
        $this->rules[] = $lifecycleRule;
    }

    /**
     * Get all lifecycle rules.
     *
     * @return LifecycleRule[]
     */
    public function getRules()
    {
        return $this->rules;
    }
}
