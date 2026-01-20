<?php

namespace IMSGlobal\Caliper\entities\foaf;

/**
 *         From http://xmlns.com/foaf/spec/#term_Agent An agent (eg. person,
 *         group, software or physical artifact)
 */
interface Agent {
    /** @return string */
    function getId();

    /** @return \Type */
    function getType();
}
