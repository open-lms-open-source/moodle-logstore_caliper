<?php

namespace IMSGlobal\Caliper\entities\media;

class MediaObjectType extends \IMSGlobal\Caliper\util\BasicEnum implements \IMSGlobal\Caliper\entities\Type {
    const
        __default = '',
        AUDIO_OBJECT = 'http://purl.imsglobal.org/caliper/v1/AudioObject',
        IMAGE_OBJECT = 'http://purl.imsglobal.org/caliper/v1/ImageObject',
        VIDEO_OBJECT = 'http://purl.imsglobal.org/caliper/v1/VideoObject';
}
