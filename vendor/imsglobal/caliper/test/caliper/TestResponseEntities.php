<?php

class TestResponseEntities {
    /** @return FillinBlankResponse */
    public static function makeFillinBlankResponse() {
        return (new IMSGlobal\Caliper\entities\response\FillinBlankResponse('https://example.edu/politicalScience/2015/american-revolution-101/assessment/001/item/001/response/001'))
            ->setDateCreated(TestTimes::createdTime())
            ->setAssignable(TestAssessmentEntities::makeAssessment())
            ->setActor(TestAgentEntities::makePerson())
            ->setAttempt(TestAssignableEntities::makeItemAttempt())
            ->setStartedAtTime(TestTimes::startedTime())
            ->setValues('2 July 1776');
    }
}