<?php

namespace IMSGlobal\Caliper\entities\annotation;

use \IMSGlobal\Caliper\entities;

/**
 *         The super-class of all Annotation types.
 *
 *         Direct sub-types can include - Highlight, Attachment, etc. - all of
 *         which are specified in the Caliper Annotation Metric Profile
 *
 */
abstract class Annotation extends entities\Entity implements entities\Generatable {
    /** @var DigitalResource */
    private $annotated;

    public function  __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::ANNOTATION));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'annotated' => (!is_null($this->getAnnotated()))
                ? $this->getAnnotated()->getId()
                : null,
        ]);
    }

    /** @return entities\DigitalResource annotated */
    public function  getAnnotated() {
        return $this->annotated;
    }

    /**
     * @param entities\DigitalResource $annotated
     * @return $this|Annotation
     */
    public function setAnnotated(entities\DigitalResource $annotated) {
        $this->annotated = $annotated;
        return $this;
    }
}

