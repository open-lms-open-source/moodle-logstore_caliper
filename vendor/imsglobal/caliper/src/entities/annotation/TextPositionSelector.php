<?php

namespace IMSGlobal\Caliper\entities\annotation;

/**
 * A Selector which describes a range of text based on its start and end positions
 * Defined by: http://www.w3.org/ns/oa#d4e667
 */
class TextPositionSelector implements \JsonSerializable {
    /** @var string */
    private $start;
    /** @var string */
    private $end;

    public function jsonSerialize() {
        return [
            'start' => $this->getStart(),
            'end' => $this->getEnd(),
        ];
    }

    /** @return string start */
    public function getStart() {
        return $this->start;
    }

    /**
     * @param string $start
     * @return $this|TextPositionSelector
     */
    public function setStart($start) {
        if (!is_string($start)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->start = $start;
        return $this;
    }

    /** @return string end */
    public function getEnd() {
        return $this->end;
    }

    /**
     * @param string $end
     * @return $this|TextPositionSelector
     */
    public function setEnd($end) {
        if (!is_string($end)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->end = $end;
        return $this;
    }
}
