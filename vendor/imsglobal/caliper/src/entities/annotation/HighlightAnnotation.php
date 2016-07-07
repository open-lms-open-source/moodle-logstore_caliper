<?php

namespace IMSGlobal\Caliper\entities\annotation;

class HighlightAnnotation extends Annotation {
    /** @var TextPositionSelector */
    private $selection;
    /** @var string */
    private $selectionText;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new AnnotationType(AnnotationType::HIGHLIGHT_ANNOTATION));
        $this->selection = new TextPositionSelector();
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'selection' => $this->getSelection(),
            'selectionText' => $this->getSelectionText()
        ]);
    }

    /**
     * @return TextPositionSelector selection
     */
    public function getSelection() {
        return $this->selection;
    }

    /**
     * @param TextPositionSelector $selection
     * @return $this|HighlightAnnotation
     */
    public function  setSelection(TextPositionSelector $selection) {
        $this->selection = $selection;
        return $this;
    }

    /**
     * @return string selectionText
     */
    public function  getSelectionText() {
        return $this->selectionText;
    }

    /**
     * @param string $selectionText
     * @return $this|HighlightAnnotation
     */
    public function setSelectionText($selectionText) {
        if (!is_string($selectionText)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->selectionText = $selectionText;
        return $this;
    }
}
