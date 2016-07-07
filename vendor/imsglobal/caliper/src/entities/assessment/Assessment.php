<?php

namespace IMSGlobal\Caliper\entities\assessment;

use \IMSGlobal\Caliper\entities\assignable;

class Assessment extends assignable\AssignableDigitalResource {
    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new assignable\AssignableDigitalResourceType(assignable\AssignableDigitalResourceType::ASSESSMENT));
    }
}
