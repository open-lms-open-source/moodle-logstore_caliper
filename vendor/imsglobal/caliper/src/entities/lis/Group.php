<?php

namespace IMSGlobal\Caliper\entities\lis;

use \IMSGlobal\Caliper\entities;

class Group extends entities\Entity implements entities\w3c\Organization {
    /** @var Course */
    private $subOrganizationOf;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::GROUP));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'subOrganizationOf' => $this->getSubOrganizationOf(),
        ]);
    }

    /** @return Course subOrganizationOf */
    public function getSubOrganizationOf() {
        return $this->subOrganizationOf;
    }

    /**
     * @param Course $subOrganizationOf
     * @return $this|Group
     */
    public function setSubOrganizationOf(entities\lis\Course $subOrganizationOf) {
        $this->subOrganizationOf = $subOrganizationOf;
        return $this;
    }
}


