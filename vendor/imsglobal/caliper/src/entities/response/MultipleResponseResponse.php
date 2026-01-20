<?php

namespace IMSGlobal\Caliper\entities\response;

class MultipleResponseResponse extends Response {
    /** @var string[] */
    private $values;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new ResponseType(ResponseType::MULTIPLERESPONSE));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'values' => $this->getValues(),
        ]);
    }

    /** @return string[] values */
    public function getValues() {
        return $this->values;
    }

    /**
     * @param string|string[] $values
     * @return $this|MultipleResponseResponse
     */
    public function setValues($values) {
        if (!is_array($values)) {
            $values = [$values];
        }

        foreach ($values as $aValue) {
            if (!is_string($aValue)) {
                throw new \InvalidArgumentException(__METHOD__ . ': array of string expected');
            }
        }

        $this->values = $values;
        return $this;
    }
}