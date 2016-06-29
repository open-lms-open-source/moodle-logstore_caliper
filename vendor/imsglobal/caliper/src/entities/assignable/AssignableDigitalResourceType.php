<?php

namespace IMSGlobal\Caliper\entities\assignable;

class AssignableDigitalResourceType extends \IMSGlobal\Caliper\util\BasicEnum implements \IMSGlobal\Caliper\entities\Type {
    const
        __default = '',
        ASSESSMENT = 'http://purl.imsglobal.org/caliper/v1/Assessment',
        ASSESSMENT_ITEM = 'http://purl.imsglobal.org/caliper/v1/AssessmentItem';
}