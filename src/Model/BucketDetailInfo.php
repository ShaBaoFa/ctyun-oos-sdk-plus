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
use Wlfpanda1012\CtyunOosSdkPlus\Config\Config;
use Wlfpanda1012\CtyunOosSdkPlus\Config\DomainConfig;
use Wlfpanda1012\CtyunOosSdkPlus\Core\OosException;

class BucketDetailInfo
{
    private $metadataLocationConstraint;

    private $dataLocationConstraint;

    public function __construct() {}

    /**
     * @throws OosException
     */
    public function setMetaLocation(MetadataLocationConstraint $metadataLocationConstraint): void
    {
        // 版本5的endpoint 无法使用本接口
        if (DomainConfig::isS5Endpoint(Config::OOS_ENDPOINT)) {
            throw new OosException('The metadata location of the bucket. This parameter is only used for Object Storage Network, the other resource pools can not use this parameter.');
        }

        $metaLocation = $metadataLocationConstraint->getLocation();
        if (! isset($metaLocation) || $metaLocation == null) {
            // throw new OosException(' MetadataRegion is not specified.');
        } else {
            /*
            if(!DomainConfig::isValidRegion($metaLocation)){
                throw new OosException($metaLocation . '  is invalid region.');
            }
            */
            $this->metadataLocationConstraint = $metadataLocationConstraint;
        }
    }

    public function getMetaLocation(): MetadataLocationConstraint
    {
        $metadataLocationConstraint = $this->metadataLocationConstraint;
        if (! isset($metadataLocationConstraint)) {
            return new MetadataLocationConstraint('');
        }

        return $this->metadataLocationConstraint;
    }

    public function setDataLocation($dataLocationConstraint): void
    {
        // 版本5的endpoint 无法使用本接口
        if (DomainConfig::isS5Endpoint(Config::OOS_ENDPOINT)) {
            throw new OosException('The metadata location of the bucket. This parameter is only used for Object Storage Network, the other resource pools can not use this parameter.');
        }

        if (isset($dataLocationConstraint) && $dataLocationConstraint != null) {
            // Type
            $type = $dataLocationConstraint->getType();

            if (! isset($type) || $type == null) {
                echo ' Data Location\'s type is not specified.\n';
                $type = 'Local';
            } else {
                if (strtolower($type) == strtolower('Local') || strtolower($type) == strtolower('Specified')) {
                } else {
                    throw new OosException('Type:' . $type . ' is invalid.');
                }
            }

            // ScheduleStrategy
            $scheduleStrategy = $dataLocationConstraint->getScheduleStrategy();

            if (! isset($scheduleStrategy) || $scheduleStrategy == null) {
                echo ' Data Location\'s scheduleStrategy is not specified.\n';
                $scheduleStrategy = 'Allowed';
            } else {
                if (strtolower($scheduleStrategy) == strtolower('Allowed') || strtolower($scheduleStrategy) == strtolower('NotAllowed')) {
                } else {
                    throw new OosException('ScheduleStrategy:' . $scheduleStrategy . ' is invalid.');
                }
            }

            // locationList
            $locationList = $dataLocationConstraint->getLocationList();
            if (! isset($locationList) || $locationList == null || sizeof($locationList) < 1) {
            }

            /*
            foreach ($locationList as $location ){
                if(!DomainConfig::isValidRegion($location)){
                    throw new OosException( 'Region:' . $location . '  is invalid region.');
                }
            }
            */

            $dataLocation = new DataLocation($type, $locationList, $scheduleStrategy);
            $this->dataLocationConstraint = $dataLocation;
        }
    }

    public function getDataLocation(): DataLocation
    {
        $dataLocationConstraint = $this->dataLocationConstraint;
        if (! isset($dataLocationConstraint)) {
            return new DataLocation('Local', [], '');
        }

        return $this->dataLocationConstraint;
    }

    public function serializeToXml(): bool|string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><CreateBucketConfiguration ></CreateBucketConfiguration >');
        if (isset($this->metadataLocationConstraint)) {
            $metadataLocationConstraintXml = $xml->addChild('MetadataLocationConstraint');
            $metadataLocationConstraintXml->addChild('Location', $this->metadataLocationConstraint->getLocation());
        }

        if (isset($this->dataLocationConstraint)) {
            $dataLocationConstraintXml = $xml->addChild('DataLocationConstraint');
            $type = $this->dataLocationConstraint->getType();
            if (isset($type)) {
                $dataLocationConstraintXml->addChild('Type', $this->dataLocationConstraint->getType());
            }

            $locationList = $this->dataLocationConstraint->getLocationList();
            if (isset($locationList)) {
                $dataLocationConstraintLocationListXml = $dataLocationConstraintXml->addChild('LocationList');
                foreach ($locationList as $location) {
                    $dataLocationConstraintLocationListXml->addChild('Location', $location);
                }
            }

            $scheduleStrategy = $this->dataLocationConstraint->getScheduleStrategy();
            if (isset($scheduleStrategy)) {
                if (isset($scheduleStrategy) && $scheduleStrategy != null) {
                    $dataLocationConstraintXml->addChild('ScheduleStrategy', $scheduleStrategy);
                }
            }
        }
        return $xml->asXML();
    }
}
