<?php

namespace IMSGlobal\Caliper\entities\assessment;

use \IMSGlobal\Caliper\entities\assignable;

class AssessmentItem extends assignable\AssignableDigitalResource {
    /** @var bool */
    private $isTimeDependent;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new assignable\AssignableDigitalResourceType(assignable\AssignableDigitalResourceType::ASSESSMENT_ITEM));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'isTimeDependent' => $this->getIsTimeDependent(),
        ]);
    }

    /** @return bool isTimeDependent */
    public function getIsTimeDependent() {
        return $this->isTimeDependent;
    }

    /**
     * @param bool $isTimeDependent
     * @return $this|AssessmentItem
     */
    public function setIsTimeDependent($isTimeDependent) {
        if (!is_bool($isTimeDependent)) {
            throw new \InvalidArgumentException(__METHOD__ . ': bool expected');
        }

        $this->isTimeDependent = $isTimeDependent;
        return $this;
    }
}
