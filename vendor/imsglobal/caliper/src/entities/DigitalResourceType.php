<?php

namespace IMSGlobal\Caliper\entities;

class DigitalResourceType extends \IMSGlobal\Caliper\util\BasicEnum implements Type {
    const
        __default = '',
        ASSIGNABLE_DIGITAL_RESOURCE = 'http://purl.imsglobal.org/caliper/v1/AssignableDigitalResource',
        EPUB_CHAPTER = 'http://www.idpf.org/epub/vocab/structure/#chapter',
        EPUB_PART = 'http://www.idpf.org/epub/vocab/structure/#part',
        EPUB_SUB_CHAPTER = 'http://www.idpf.org/epub/vocab/structure/#subchapter',
        EPUB_VOLUME = 'http://www.idpf.org/epub/vocab/structure/#volume',
        FRAME = 'http://purl.imsglobal.org/caliper/v1/Frame',
        MEDIA_OBJECT = 'http://purl.imsglobal.org/caliper/v1/MediaObject',
        MEDIA_LOCATION = 'http://purl.imsglobal.org/caliper/v1/MediaLocation',
        READING = 'http://purl.imsglobal.org/caliper/v1/Reading',
        WEB_PAGE = 'http://purl.imsglobal.org/caliper/v1/WebPage';
}