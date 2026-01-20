<?php

namespace IMSGlobal\Caliper\events;

use \IMSGlobal\Caliper\context;
use \IMSGlobal\Caliper\entities;
use \IMSGlobal\Caliper\actions;
use \IMSGlobal\Caliper\util;

abstract class Event extends \IMSGlobal\Caliper\util\ClassUtil implements \JsonSerializable {
    /** @var Context */
    private $context;
    /** @var EventType */
    private $type;
    /** @var \foaf\Agent */
    private $actor;
    /** @var Action */
    private $action;
    /** @var object */
    private $object;
    /** @var Targetable */
    private $target;
    /** @var Generatable */
    private $generated;
    /** @var DateTime */
    private $eventTime;
    /** @var SoftwareApplication */
    private $edApp;
    /** @var Organization */
    private $group;
    /** @var Membership */
    private $membership;
    /** @var Session */
    private $federatedSession;

    public function __construct() {
        $this->setContext(new context\Context(context\Context::CONTEXT));
    }

    public function jsonSerialize() {
        return [
            '@context' => $this->getContext(),
            '@type' => $this->getType(),
            'actor' => $this->getActor(),
            'action' => $this->getAction(),
            'object' => $this->getObject(),
            'target' => $this->getTarget(),
            'generated' => $this->getGenerated(),
            'eventTime' => util\TimestampUtil::formatTimeISO8601MillisUTC($this->getEventTime()),
            'edApp' => $this->getEdApp(),
            'group' => $this->getGroup(),
            'membership' => $this->getMembership(),
            'federatedSession' => (!is_null($this->getFederatedSession()))
                ? $this->getFederatedSession()->getId()
                : null,
        ];
    }

    /** @return context\Context context */
    public function getContext() {
        return $this->context;
    }

    /**
     * @param context\Context $context
     * @return $this|Event
     */
    public function setContext(context\Context $context) {
        $this->context = $context;
        return $this;
    }

    /** @return EventType type */
    public function getType() {
        return $this->type;
    }

    /**
     * @param EventType $type
     * @return $this|Event
     */
    public function setType(EventType $type) {
        $this->type = $type;
        return $this;
    }

    /** @return entities\foaf\Agent actor */
    public function getActor() {
        return $this->actor;
    }

    /**
     * @param entities\foaf\Agent $actor
     * @return $this|Event
     */
    public function setActor(entities\foaf\Agent $actor) {
        $this->actor = $actor;
        return $this;
    }

    /** @return actions\Action action */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param Action $action
     * @return $this|Event
     */
    public function setAction(actions\Action $action) {
        $this->action = $action;
        return $this;
    }

    /** @return object object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param object $object
     * @return $this|Event
     */
    public function setObject($object) {
        if (!is_object($object)) {
            throw new \InvalidArgumentException(__METHOD__ . ': object expected');
        }

        $this->object = $object;
        return $this;
    }

    /** @return Targetable target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param entities\Targetable $target
     * @return $this|Event
     */
    public function setTarget(entities\Targetable $target) {
        $this->target = $target;
        return $this;
    }

    /** @return entities\Generatable generated */
    public function  getGenerated() {
        return $this->generated;
    }

    /**
     * @param entities\Generatable $generated
     * @return $this|Event
     */
    public function setGenerated(entities\Generatable $generated) {
        $this->generated = $generated;
        return $this;
    }

    /** @return \DateTime eventTime */
    public function getEventTime() {
        return $this->eventTime;
    }

    /**
     * @param \DateTime $eventTime
     * @return $this|Event
     */
    public function setEventTime(\DateTime $eventTime) {
        $this->eventTime = $eventTime;
        return $this;
    }

    /** @return entities\agent\SoftwareApplication edApp */
    public function getEdApp() {
        return $this->edApp;
    }

    /**
     * @param entities\agent\SoftwareApplication $edApp
     * @return $this|Event
     */
    public function setEdApp(entities\agent\SoftwareApplication $edApp) {
        $this->edApp = $edApp;
        return $this;
    }

    /** @return Organization group */
    public function getGroup() {
        return $this->group;
    }

    /**
     * @param entities\w3c\Organization $group
     * @return $this|Event
     */
    public function setGroup(entities\w3c\Organization $group) {
        $this->group = $group;
        return $this;
    }

    /** @return entities\w3c\Membership membership */
    public function getMembership() {
        return $this->membership;
    }

    /**
     * @param entities\w3c\Membership|object $membership
     * @return $this|Event
     */
    public function setMembership(entities\w3c\Membership $membership) {
        $this->membership = $membership;
        return $this;
    }

    /** @return Session */
    public function getFederatedSession() {
        return $this->federatedSession;
    }

    /**
     * @param entities\session\Session $federatedSession
     * @return $this|Event
     */
    public function setFederatedSession(entities\session\Session $federatedSession) {
        $this->federatedSession = $federatedSession;
        return $this;
    }
}

