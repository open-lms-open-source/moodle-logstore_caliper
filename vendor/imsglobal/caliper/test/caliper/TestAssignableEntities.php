<?php

class TestAssignableEntities {
    public static function makeAssessmentAttempt() {
        /** @return Attempt */
        return (new IMSGlobal\Caliper\entities\assignable\Attempt('https://example.edu/politicalScience/2015/american-revolution-101/assessment/001/attempt/5678'))
            ->setDateCreated(TestTimes::createdTime())
            ->setActor(TestAgentEntities::makePerson())
            ->setCount(1)
            ->setStartedAtTime(TestTimes::startedTime());
    }

    public static function makeItemAttempt() {
        /** @return Attempt */
        return (new IMSGlobal\Caliper\entities\assignable\Attempt('https://example.edu/politicalScience/2015/american-revolution-101/assessment/001/item/001/attempt/789'))
            ->setDateCreated(TestTimes::createdTime())
            ->setActor(TestAgentEntities::makePerson())
            ->setAssignable(TestAssessmentEntities::makeAssessment())
            ->setCount(1)
            ->setStartedAtTime(TestTimes::startedTime());
    }

    public static function makeResult() {
        /** @return Result */
        return (new IMSGlobal\Caliper\entities\outcome\Result('https://example.edu/politicalScience/2015/american-revolution-101/assessment/001/attempt/5678/result'))
            ->setDateCreated(TestTimes::createdTime())
            ->setAssignable(TestAssessmentEntities::makeAssessment())
            ->setActor(TestAgentEntities::makePerson())
            ->setNormalScore(3.0)
            ->setPenaltyScore(0.0)
            ->setExtraCreditScore(0.0)
            ->setTotalScore(3.0)
            ->setCurvedTotalScore(3.0)
            ->setCurveFactor(0.0)
            ->setComment('Well done.')
            ->setScoredBy(TestAgentEntities::makeAssessmentApplication());
    }
}