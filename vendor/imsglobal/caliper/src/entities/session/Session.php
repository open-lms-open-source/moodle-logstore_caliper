<?php

namespace IMSGlobal\Caliper\entities\session;

use \IMSGlobal\Caliper\entities;
use \IMSGlobal\Caliper\util;

class Session extends entities\Entity implements entities\Generatable, entities\Targetable {
    /** @var \foaf\Agent */
    private $actor;
    /** @var DateTime */
    private $startedAtTime;
    /** @var DateTime */
    private $endedAtTime;
    /** @var string (seconds) */
    private $duration;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::SESSION));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'actor' => $this->getActor(),
            'startedAtTime' => util\TimestampUtil::formatTimeISO8601MillisUTC($this->getStartedAtTime()),
            'endedAtTime' => util\TimestampUtil::formatTimeISO8601MillisUTC($this->getEndedAtTime()),
            'duration' => $this->getDurationFormatted(),
        ]);
    }

    /** @return entities\foaf\Agent actor */
    public function getActor() {
        return $this->actor;
    }

    /**
     * @param entities\foaf\Agent $actor
     * @return $this|Session
     */
    public function setActor(entities\foaf\Agent $actor) {
        $this->actor = $actor;
        return $this;
    }

    /** @return \DateTime startedAtTime */
    public function getStartedAtTime() {
        return $this->startedAtTime;
    }

    /**
     * @param \DateTime $startedAtTime
     * @return $this|Session
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
     * @return $this|Session
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

    /** @return string duration (seconds) */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * @param string $duration (seconds)
     * @return $this|Session
     */
    public function setDuration($duration) {
        if (!is_string($duration)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->duration = $duration;
        return $this;
    }
}