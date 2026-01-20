<?php

namespace IMSGlobal\Caliper\events;

use \IMSGlobal\Caliper\entities;
use \IMSGlobal\Caliper\actions;

class NavigationEvent extends Event {
    /** @var DigitalResource */
    private $navigatedFrom;

    public function __construct() {
        parent::__construct();
        $this->setType(new EventType(EventType::NAVIGATION))
            ->setAction(new actions\Action(actions\Action::NAVIGATED_TO));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'navigatedFrom' => $this->getNavigatedFrom(),
        ]);
    }

    /** @return entities\DigitalResource navigatedFrom */
    public function getNavigatedFrom() {
        return $this->navigatedFrom;
    }

    /**
     * @param entities\DigitalResource $navigatedFrom
     * @return $this|NavigationEvent
     */
    public function setNavigatedFrom(entities\DigitalResource $navigatedFrom) {
        $this->navigatedFrom = $navigatedFrom;
        return $this;
    }

    /**
     * @deprecated
     * @return entities\DigitalResource navigatedFrom
     */
    public function getFromResource() {
        return $this->getNavigatedFrom();
    }

    /**
     * @deprecated
     * @param entities\DigitalResource $fromResource
     * @return $this|NavigationEvent
     */
    public function setFromResource(entities\DigitalResource $fromResource) {
        return $this->setNavigatedFrom($fromResource);
    }
}

