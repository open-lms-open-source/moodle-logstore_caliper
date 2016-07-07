<?php

namespace IMSGlobal\Caliper\entities\response;

use \IMSGlobal\Caliper\entities;
use \IMSGlobal\Caliper\util;

abstract class Response extends entities\Entity implements entities\Generatable {
    /** @var entities\DigitalResource */
    private $assignable;
    /** @var entities\\foaf\Agent */
    private $actor;
    /** @var entities\assignable\Attempt */
    private $attempt;
    /** @var \DateTime */
    private $startedAtTime;
    /** @var \DateTime */
    private $endedAtTime;
    /** @var string */
    private $duration;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::RESPONSE));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'actor' => (!is_null($this->getActor()))
                ? $this->getActor()->getId()
                : null,
            'assignable' => (!is_null($this->getAssignable()))
                ? $this->getAssignable()->getId()
                : null,
            'attempt' => $this->getAttempt(),
            'duration' => $this->getDuration(),
            'endedAtTime' => util\TimestampUtil::formatTimeISO8601MillisUTC($this->getEndedAtTime()),
            'startedAtTime' => util\TimestampUtil::formatTimeISO8601MillisUTC($this->getStartedAtTime()),
        ]);
    }

    /** @return entities\DigitalResource assignable */
    public function getAssignable() {
        return $this->assignable;
    }

    /**
     * @param entities\DigitalResource $assignable
     * @return $this|Response
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
     * @return $this|Response
     */
    public function setActor(entities\foaf\Agent $actor) {
        $this->actor = $actor;
        return $this;
    }

    /** @return Attempt attempt */
    public function getAttempt() {
        return $this->attempt;
    }

    /**
     * @param entities\assignable\Attempt $attempt
     * @return $this|Response
     */
    public function setAttempt(entities\assignable\Attempt $attempt) {
        $this->attempt = $attempt;
        return $this;
    }

    /** @return \DateTime startedAtTime */
    public function getStartedAtTime() {
        return $this->startedAtTime;
    }

    /**
     * @param \DateTime $startedAtTime
     * @return $this|Response
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
     * @return $this|Response
     */
    public function setEndedAtTime(\DateTime $endedAtTime) {
        $this->endedAtTime = $endedAtTime;
        return $this;
    }

    /** @return string duration */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return $this|Response
     */
    public function setDuration($duration) {
        if (!is_string($duration)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->duration = $duration;
        return $this;
    }

}
