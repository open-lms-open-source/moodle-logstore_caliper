<?php

namespace IMSGlobal\Caliper\events;

class AssessmentEvent extends Event {
    public function __construct() {
        parent::__construct();
        $this->setType(new EventType(EventType::ASSESSMENT));
    }
}
