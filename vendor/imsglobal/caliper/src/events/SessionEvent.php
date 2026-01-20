<?php

namespace IMSGlobal\Caliper\events;

class SessionEvent extends Event {
	public function __construct(){
		parent::__construct();
		$this->setType(new EventType(EventType::SESSION));
	}
}
