<?php

namespace IMSGlobal\Caliper\entities\annotation;

class TagAnnotation extends Annotation {
    /** @var string[] */
    public $tags = [];

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new AnnotationType(AnnotationType::TAG_ANNOTATION));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'tags' => $this->getTags(),
        ]);
    }

    /** @return string[] tags */
    public function getTags() {
        return $this->tags;
    }

    /**
     * @param string|string[] $tags
     * @return $this|TagAnnotation
     */
    public function setTags($tags) {
        if (!is_array($tags)) {
            $tags = [$tags];
        }

        foreach ($tags as $aTags) {
            if (!is_string($aTags)) {
                throw new \InvalidArgumentException(__METHOD__ . ': string expected');
            }
        }

        $this->tags = $tags;
        return $this;
    }

}
