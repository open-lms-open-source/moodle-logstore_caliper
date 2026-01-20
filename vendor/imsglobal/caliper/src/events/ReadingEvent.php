<?php

namespace IMSGlobal\Caliper\events;

class ReadingEvent extends Event {
    public function __construct() {
        parent::__construct();
        $this->setType(new EventType(EventType::READING));
    }
}
