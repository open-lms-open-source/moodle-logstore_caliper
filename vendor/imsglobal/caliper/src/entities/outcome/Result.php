<?php

namespace IMSGlobal\Caliper\entities\outcome;

use \IMSGlobal\Caliper\entities;

class Result extends entities\Entity implements entities\Generatable {
    /** @var entities\DigitalResource */
    private $assignable;
    /** @var \foaf\Agent */
    private $actor;
    /** @var double */
    private $normalScore;
    /** @var double */
    private $penaltyScore;
    /** @var double */
    private $extraCreditScore;
    /** @var double */
    private $totalScore;
    /** @var double */
    private $curvedTotalScore;
    /** @var double */
    private $curveFactor;
    /** @var string */
    private $comment;
    /** @var \foaf\Agent */
    private $scoredBy;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::RESULT));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'assignable' => (!is_null($this->getAssignable()))
                ? $this->getAssignable()->getId()
                : null,
            'actor' => (!is_null($this->getActor()))
                ? $this->getActor()->getId()
                : null,
            'normalScore' => $this->getNormalScore(),
            'penaltyScore' => $this->getPenaltyScore(),
            'extraCreditScore' => $this->getExtraCreditScore(),
            'totalScore' => $this->getTotalScore(),
            'curvedTotalScore' => $this->getCurvedTotalScore(),
            'curveFactor' => $this->getCurveFactor(),
            'comment' => $this->getComment(),
            'scoredBy' => $this->getScoredBy(),
        ]);
    }

    /** @return entities\DigitalResource assignable */
    public function getAssignable() {
        return $this->assignable;
    }

    /**
     * @param entities\DigitalResource $assignable
     * @return $this|Result
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
     * @return $this|Result
     */
    public function setActor(entities\foaf\Agent $actor) {
        $this->actor = $actor;
        return $this;
    }

    /** @return double normalScore */
    public function getNormalScore() {
        return $this->normalScore;
    }

    /**
     * @param double $normalScore
     * @return $this|Result
     */
    public function setNormalScore($normalScore) {
        if (!is_double($normalScore)) {
            throw new \InvalidArgumentException(__METHOD__ . ': double expected');
        }

        $this->normalScore = $normalScore;
        return $this;
    }

    /** @return double penaltyScore */
    public function getPenaltyScore() {
        return $this->penaltyScore;
    }

    /**
     * @param double $penaltyScore
     * @return $this|Result
     */
    public function setPenaltyScore($penaltyScore) {
        if (!is_double($penaltyScore)) {
            throw new \InvalidArgumentException(__METHOD__ . ': double expected');
        }

        $this->penaltyScore = $penaltyScore;
        return $this;
    }

    /** @return double extraCreditScore */
    public function getExtraCreditScore() {
        return $this->extraCreditScore;
    }

    /**
     * @param double $extraCreditScore
     * @return $this|Result
     */
    public function setExtraCreditScore($extraCreditScore) {
        if (!is_double($extraCreditScore)) {
            throw new \InvalidArgumentException(__METHOD__ . ': double expected');
        }

        $this->extraCreditScore = $extraCreditScore;
        return $this;
    }

    /** @return double totalScore */
    public function getTotalScore() {
        return $this->totalScore;
    }

    /**
     * @param double $totalScore
     * @return $this|Result
     */
    public function setTotalScore($totalScore) {
        if (!is_double($totalScore)) {
            throw new \InvalidArgumentException(__METHOD__ . ': double expected');
        }

        $this->totalScore = $totalScore;
        return $this;
    }

    /** @return double curvedTotalScore */
    public function getCurvedTotalScore() {
        return $this->curvedTotalScore;
    }

    /**
     * @param double $curvedTotalScore
     * @return $this|Result
     */
    public function setCurvedTotalScore($curvedTotalScore) {
        if (!is_double($curvedTotalScore)) {
            throw new \InvalidArgumentException(__METHOD__ . ': double expected');
        }

        $this->curvedTotalScore = $curvedTotalScore;
        return $this;
    }

    /** @return double curveFactor */
    public function getCurveFactor() {
        return $this->curveFactor;
    }

    /**
     * @param double $curveFactor
     * @return $this|Result
     */
    public function setCurveFactor($curveFactor) {
        if (!is_double($curveFactor)) {
            throw new \InvalidArgumentException(__METHOD__ . ': double expected');
        }

        $this->curveFactor = $curveFactor;
        return $this;
    }

    /** @return string comment */
    public function getComment() {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return $this|Result
     */
    public function setComment($comment) {
        if (!is_string($comment)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->comment = $comment;
        return $this;
    }

    /** @return \foaf\Agent scoredBy */
    public function getScoredBy() {
        return $this->scoredBy;
    }

    /**
     * @param entities\foaf\Agent $scoredBy
     * @return $this|Result
     */
    public function setScoredBy(entities\foaf\Agent $scoredBy) {
        $this->scoredBy = $scoredBy;
        return $this;
    }
}

