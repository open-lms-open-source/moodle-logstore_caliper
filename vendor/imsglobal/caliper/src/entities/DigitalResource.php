<?php

namespace IMSGlobal\Caliper\entities;

use \IMSGlobal\Caliper\util\TimestampUtil;

/**
 *         Caliper representation of a CreativeWork
 *         (https://schema.org/CreativeWork)
 *
 *         We add on learning specific attributes, including a list of
 *         {@link LearningObjective} learning objectives and a list of
 *         {@link String} keywords
 *
 *         In addition, we add a the following attributes:
 *
 *         name (https://schema.org/name) -the name of the resource,
 *
 *         about (https://schema.org/about) - the subject matter of the resource
 *
 *         language (https://schema.org/Language) - Natural languages such as
 *         Spanish, Tamil, Hindi, English, etc. and programming languages such
 *         as Scheme and Lisp
 *
 */
class DigitalResource extends Entity implements schemadotorg\CreativeWork, Targetable {
    /** @var string[] */
    private $objectTypes = [];
    /** @var LearningObjective[] */
    private $alignedLearningObjectives = [];
    /** @var string[] */
    private $keywords = [];
    /** @var CreativeWork */
    private $isPartOf;
    /** @var DateTime */
    private $datePublished;
    /** @var string */
    private $version;

    public function __construct($id) {
        parent::__construct($id);
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'objectType' => $this->getObjectTypes(),
            'alignedLearningObjective' => $this->getAlignedLearningObjectives(),
            'keywords' => $this->getKeywords(),
            'isPartOf' => $this->getIsPartOf(),
            'datePublished' => TimestampUtil::formatTimeISO8601MillisUTC($this->getDatePublished()),
            'version' => $this->getVersion(),
        ]);
    }

    /** @return string[] objectTypes */
    public function getObjectTypes() {
        return $this->objectTypes;
    }

    /**
     * @param string|string[] $objectTypes
     * @return $this|DigitalResource
     */
    public function setObjectTypes($objectTypes) {
        if (!is_array($objectTypes)) {
            $objectTypes = [$objectTypes];
        }

        foreach ($objectTypes as $anObjectType) {
            if (!is_string($anObjectType)) {
                throw new \InvalidArgumentException(__METHOD__ . ': array of string expected');
            }
        }

        $this->objectType = $objectTypes;
        return $this;
    }

    /** @return LearningObjective[] alignedLearningObjectives */
    public function  getAlignedLearningObjectives() {
        return $this->alignedLearningObjectives;
    }

    /**
     * @param LearningObjective|LearningObjective[] $alignedLearningObjectives
     * @return $this|DigitalResource
     */
    public function setAlignedLearningObjectives($alignedLearningObjectives) {
        if (!is_array($alignedLearningObjectives)) {
            $alignedLearningObjectives = [$alignedLearningObjectives];
        }

        foreach ($alignedLearningObjectives as $anAlignedLearningObjective) {
            if (!($anAlignedLearningObjective instanceof LearningObjective)) {
                throw new \InvalidArgumentException(
                    __METHOD__ . ': array of ' . LearningObjective::className() . ' expected');
            }
        }

        $this->alignedLearningObjectives = $alignedLearningObjectives;
        return $this;
    }

    /** @return string[] keywords */
    public function  getKeywords() {
        return $this->keywords;
    }

    /**
     * @param string|string[] $keywords
     * @return $this|DigitalResource
     */
    public function setKeywords($keywords) {
        if (!is_array($keywords)) {
            $keywords = [$keywords];
        }

        foreach ($keywords as $aKeyword) {
            if (!is_string($aKeyword)) {
                throw new \InvalidArgumentException(__METHOD__ . ': array of string expected');
            }
        }

        $this->keywords = $keywords;
        return $this;
    }

    /** @return schemadotorg\CreativeWork isPartOf */
    public function getIsPartOf() {
        return $this->isPartOf;
    }

    /**
     * @param schemadotorg\CreativeWork $isPartOf
     * @return $this|DigitalResource
     */
    public function setIsPartOf(schemadotorg\CreativeWork $isPartOf) {
        $this->isPartOf = $isPartOf;
        return $this;
    }

    /**
     * @return \DateTime datePublished
     */
    public function getDatePublished() {
        return $this->datePublished;
    }

    /**
     * @param \DateTime $datePublished
     * @return $this|DigitalResource
     */
    public function setDatePublished(\DateTime $datePublished) {
        $this->datePublished = $datePublished;
        return $this;
    }

    /** @return string version */
    public function getVersion() {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this|DigitalResource
     */
    public function setVersion($version) {
        if (!is_string($version)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->version = $version;
        return $this;
    }
}

