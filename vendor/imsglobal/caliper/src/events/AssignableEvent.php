<?php

namespace IMSGlobal\Caliper\events;

class AssignableEvent extends Event {
    public function __construct() {
        parent::__construct();
        $this->setType(new EventType(EventType::ASSIGNABLE));
    }
}
