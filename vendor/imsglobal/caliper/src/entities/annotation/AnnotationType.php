<?php

namespace IMSGlobal\Caliper\entities\annotation;

class AnnotationType extends \IMSGlobal\Caliper\util\BasicEnum implements \IMSGlobal\Caliper\entities\Type {
    const
        __default = '',
        BOOKMARK_ANNOTATION = 'http://purl.imsglobal.org/caliper/v1/BookmarkAnnotation',
        HIGHLIGHT_ANNOTATION = 'http://purl.imsglobal.org/caliper/v1/HighlightAnnotation',
        SHARED_ANNOTATION = 'http://purl.imsglobal.org/caliper/v1/SharedAnnotation',
        TAG_ANNOTATION = 'http://purl.imsglobal.org/caliper/v1/TagAnnotation';
}

