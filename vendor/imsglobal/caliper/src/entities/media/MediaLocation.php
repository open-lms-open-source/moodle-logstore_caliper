<?php

namespace IMSGlobal\Caliper\entities\media;

use \IMSGlobal\Caliper\entities;

class MediaLocation extends entities\DigitalResource implements entities\Targetable {
    /** @var long (seconds) */
    private $currentTime;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\DigitalResourceType(entities\DigitalResourceType::MEDIA_LOCATION));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'currentTime' => $this->getCurrentTime(),
        ]);
    }

    /** @return long currentTime (seconds) */
    public function getCurrentTime() {
        return $this->currentTime;
    }

    /**
     * @param long $currentTime (seconds)
     * @return $this|MediaLocation
     */
    public function setCurrentTime($currentTime) {
        if (!is_long($currentTime)) {
            throw new \InvalidArgumentException(__METHOD__ . ': long expected');
        }

        $this->currentTime = $currentTime;
        return $this;
    }
}