<?php

namespace IMSGlobal\Caliper\entities\assignable;

use \IMSGlobal\Caliper\entities;
use \IMSGlobal\Caliper\util;

class Attempt extends entities\Entity implements entities\Generatable {
    /** @var entities\DigitalResource */
    private $assignable;
    /** @var entities\foaf\Agent */
    private $actor;
    /** @var int */
    private $count;
    /** @var \DateTime */
    private $startedAtTime;
    /** @var \DateTime */
    private $endedAtTime;
    /** @var string */
    private $duration;

    public function  __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::ATTEMPT));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'assignable' => (!is_null($this->getAssignable()))
                ? $this->getAssignable()->getId()
                : null,
            'actor' => (!is_null($this->getActor()))
                ? $this->getActor()->getId()
                : null,
            'count' => $this->getCount(),
            'startedAtTime' => util\TimestampUtil::formatTimeISO8601MillisUTC($this->getStartedAtTime()),
            'endedAtTime' => util\TimestampUtil::formatTimeISO8601MillisUTC($this->getEndedAtTime()),
            'duration' => $this->getDurationFormatted(),
        ]);
    }

    /** @return entities\DigitalResource assignable */
    public function getAssignable() {
        return $this->assignable;
    }

    /**
     * @param entities\DigitalResource $assignable
     * @return $this|Attempt
     */
    public function setAssignable(entities\DigitalResource $assignable) {
        $this->assignable = $assignable;
        return $this;
    }

    /** @return entities\foaf\Agent actor */
    public function getActor() {
        return $this->actor;
    }

    /**
     * @param entities\foaf\Agent $actor
     * @return $this|Attempt
     */
    public function setActor(entities\foaf\Agent $actor) {
        $this->actor = $actor;
        return $this;
    }

    /** @return int count */
    public function getCount() {
        return $this->count;
    }

    /**
     * @param int $count
     * @return $this|Attempt
     */
    public function setCount($count) {
        if (!is_int($count)) {
            throw new \InvalidArgumentException(__METHOD__ . ': int expected');
        }

        $this->count = $count;
        return $this;
    }

    /** @return \DateTime startedAtTime */
    public function getStartedAtTime() {
        return $this->startedAtTime;
    }

    /**
     * @param \DateTime $startedAtTime
     * @return $this|Attempt
     */
    public function setStartedAtTime(\DateTime $startedAtTime) {
        $this->startedAtTime = $startedAtTime;
        return $this;
    }

    /** @return \DateTime endedAtTime */
    public function getEndedAtTime() {
        return $this->endedAtTime;
    }

    /**
     * @param \DateTime $endedAtTime
     * @return $this|Attempt
     */
    public function setEndedAtTime(\DateTime $endedAtTime) {
        $this->endedAtTime = $endedAtTime;
        return $this;
    }

    /** @return null|string Duration in seconds formatted according to ISO 8601 ("PTnnnnS") */
    public function getDurationFormatted() {
        if ($this->getDuration() === null) {
            return null;
        }

        return 'PT' . $this->getDuration() . 'S';
    }

    /** @return string duration */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return $this|Attempt
     */
    public function setDuration($duration) {
        if (!is_string($duration)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->duration = $duration;
        return $this;
    }
}
