<?php

namespace IMSGlobal\Caliper\entities\w3c;

interface Membership {
    /** @return Agent */
    function getMember();

    /** @return Organization */
    function getOrganization();

    /** @return Role[] */
    function getRoles();

    /** @return Status */
    function getStatus();
}
