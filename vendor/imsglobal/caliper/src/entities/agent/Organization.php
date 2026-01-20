<?php

namespace IMSGlobal\Caliper\entities\agent;

use IMSGlobal\Caliper\entities;

class Organization extends entities\Entity implements entities\foaf\Agent, entities\w3c\Organization {
    /** @var entities\w3c\Organization */
    private $subOrganizationOf;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::ORGANIZATION));
    }

    /** @return entities\w3c\Organization */
    public function  getSubOrganizationOf() {
        return $this->subOrganizationOf;
    }

    /**
     * @param entities\w3c\Organization $subOrganizationOf
     * @return $this|Organization
     */
    public function  setSubOrganizationOf(entities\w3c\Organization $subOrganizationOf) {
        $this->subOrganizationOf = $subOrganizationOf;
        return $this;
    }
}
