<?php

namespace IMSGlobal\Caliper\events;

class AssessmentItemEvent extends Event {
    public function __construct() {
        parent::__construct();
        $this->setType(new EventType(EventType::ASSESSMENT_ITEM));
    }
}
