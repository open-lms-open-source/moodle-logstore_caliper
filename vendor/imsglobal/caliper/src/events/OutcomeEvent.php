<?php

namespace IMSGlobal\Caliper\events;

use \IMSGlobal\Caliper\actions;

class OutcomeEvent extends Event {
    public function __construct() {
        parent::__construct();
        $this->setType(new EventType(EventType::OUTCOME))
            ->setAction(new actions\Action(actions\Action::GRADED));
    }
}
