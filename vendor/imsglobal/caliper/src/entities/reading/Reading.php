<?php

namespace IMSGlobal\Caliper\entities\reading;

use \IMSGlobal\Caliper\entities;

class Reading extends entities\DigitalResource {
    public function  __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\DigitalResourceType(entities\DigitalResourceType::READING));
    }
}