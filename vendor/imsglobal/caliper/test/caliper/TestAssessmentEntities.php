<?php

class TestAssessmentEntities {
    /** @return Assessment */
    public static function makeAssessment() {
        return (new IMSGlobal\Caliper\entities\assessment\Assessment('https://example.edu/politicalScience/2015/american-revolution-101/assessment/001'))
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime())
            ->setDatePublished(TestTimes::publishedTime())
            ->setDateToActivate(TestTimes::activateTime())
            ->setDateToShow(TestTimes::showTime())
            ->setDateToStartOn(TestTimes::startOnTime())
            ->setDateToSubmit(TestTimes::submitTime())
            ->setMaxAttempts(2)
            ->setMaxScore(3.0)
            ->setMaxSubmits(2)
            ->setName('American Revolution - Key Figures Assessment')
            ->setVersion('1.0');
    }

    /** @return AssessmentItem */
    public static function makeAssessmentItem() {
        return (new IMSGlobal\Caliper\entities\assessment\AssessmentItem('https://example.edu/politicalScience/2015/american-revolution-101/assessment/001/item/001'))
            ->setName('Assessment Item 1')
            ->setIsPartOf(TestAssessmentEntities::makeAssessment())
            ->setVersion('1.0')
            ->setMaxAttempts(2)
            ->setMaxSubmits(2)
            ->setMaxScore(1.0)
            ->setIsTimeDependent(false);
    }
}