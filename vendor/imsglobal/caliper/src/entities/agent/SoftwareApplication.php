<?php

namespace IMSGlobal\Caliper\entities\agent;

use IMSGlobal\Caliper\entities;

class SoftwareApplication extends entities\Entity implements entities\foaf\Agent, entities\schemadotorg\SoftwareApplication {
    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::SOFTWARE_APPLICATION));
    }
}
