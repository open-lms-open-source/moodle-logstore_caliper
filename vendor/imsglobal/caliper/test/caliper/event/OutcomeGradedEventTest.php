<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class OutcomeGradedEventTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperAssessmentOutcomeEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\OutcomeEvent())
            ->setActor(TestAgentEntities::makePerson())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::GRADED))
            ->setObject(TestAssignableEntities::makeAssessmentAttempt()
                ->setAssignable(TestAssessmentEntities::makeAssessment()))
            ->setGenerated(TestAssignableEntities::makeResult())
            ->setEventTime(TestTimes::startedTime())
            ->setEdApp(TestAgentEntities::makeAssessmentApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setMembership(TestLisEntities::makeMembership()));
    }
}