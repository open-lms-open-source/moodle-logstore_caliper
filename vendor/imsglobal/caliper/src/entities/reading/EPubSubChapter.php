<?php

namespace IMSGlobal\Caliper\entities\reading;

use \IMSGlobal\Caliper\entities;

/**
 *         Representation of an EPUB 3 Volume
 *
 *         A major sub-division of a chapter
 *         http://www.idpf.org/epub/vocab/structure/#subchapter
 */
class EPubSubChapter extends entities\DigitalResource {
    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\DigitalResourceType(entities\DigitalResourceType::EPUB_SUB_CHAPTER));
    }
}