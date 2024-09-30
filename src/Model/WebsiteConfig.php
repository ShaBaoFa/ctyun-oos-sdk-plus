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
 * Class WebsiteConfig.
 * @see http://help.ctyun.com/document_detail/oss/api-reference/bucket/PutBucketWebsite.html
 */
class WebsiteConfig implements XmlConfig
{
    /**
     * @return string
     */
    private $indexDocument;

    private $errorDocument;

    /**
     * WebsiteConfig constructor.
     */
    public function __construct() {}

    public function setIndexDocument($indexDocument)
    {
        $this->indexDocument = $indexDocument;
    }

    /**
     * @return string
     */
    public function getIndexDocument()
    {
        return $this->indexDocument;
    }

    public function setErrorDocument($errorDocument)
    {
        $this->errorDocument = $errorDocument;
    }

    /**
     * @return string
     */
    public function getErrorDocument()
    {
        return $this->errorDocument;
    }

    /**
     * @param string $strXml
     */
    public function parseFromXml($strXml)
    {
        $xml = simplexml_load_string($strXml);
        if (isset($xml->IndexDocument, $xml->IndexDocument->Suffix)) {
            $this->indexDocument = strval($xml->IndexDocument->Suffix);
        }
        if (isset($xml->ErrorDocument, $xml->ErrorDocument->Key)) {
            $this->errorDocument = strval($xml->ErrorDocument->Key);
        }
    }

    /**
     * Serialize the WebsiteConfig object into xml string.
     *
     * @return string
     * @throws OosException
     */
    public function serializeToXml()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><WebsiteConfiguration></WebsiteConfiguration>');
        if (isset($this->indexDocument)) {
            $index_document_part = $xml->addChild('IndexDocument');
            $index_document_part->addChild('Suffix', $this->indexDocument);
        } else {
            throw new OosException('Index document is null.');
        }

        if (isset($this->errorDocument)) {
            $error_document_part = $xml->addChild('ErrorDocument');
            $error_document_part->addChild('Key', $this->errorDocument);
        }
        return $xml->asXML();
    }
}
