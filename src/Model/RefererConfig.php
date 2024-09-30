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
 * Class RefererConfig.
 *
 * @see http://help.ctyun.com/document_detail/oss/api-reference/bucket/PutBucketReferer.html
 */
class RefererConfig implements XmlConfig
{
    private $allowEmptyReferer = true;

    private $refererList = [];

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->serializeToXml();
    }

    /**
     * @param string $strXml
     */
    public function parseFromXml($strXml)
    {
        $xml = simplexml_load_string($strXml);
        if (! isset($xml->AllowEmptyReferer)) {
            return;
        }
        if (! isset($xml->RefererList)) {
            return;
        }
        $this->allowEmptyReferer =
            (strval($xml->AllowEmptyReferer) === 'TRUE' || strval($xml->AllowEmptyReferer) === 'true') ? true : false;

        foreach ($xml->RefererList->Referer as $key => $refer) {
            $this->refererList[] = strval($refer);
        }
    }

    /**
     * serialize the RefererConfig object into xml string.
     *
     * @return string
     */
    public function serializeToXml()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><RefererConfiguration></RefererConfiguration>');
        if ($this->allowEmptyReferer) {
            $xml->addChild('AllowEmptyReferer', 'true');
        } else {
            $xml->addChild('AllowEmptyReferer', 'false');
        }
        $refererList = $xml->addChild('RefererList');
        foreach ($this->refererList as $referer) {
            $refererList->addChild('Referer', $referer);
        }
        return $xml->asXML();
    }

    /**
     * @param bool $allowEmptyReferer
     */
    public function setAllowEmptyReferer($allowEmptyReferer)
    {
        $this->allowEmptyReferer = $allowEmptyReferer;
    }

    /**
     * @param string $referer
     */
    public function addReferer($referer)
    {
        $this->refererList[] = $referer;
    }

    /**
     * @return bool
     */
    public function isAllowEmptyReferer()
    {
        return $this->allowEmptyReferer;
    }

    /**
     * @return array
     */
    public function getRefererList()
    {
        return $this->refererList;
    }
}
