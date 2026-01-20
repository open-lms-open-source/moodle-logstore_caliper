<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class AssignableActivatedEventTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperAssignableEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\AssignableEvent())
            ->setActor(TestAgentEntities::makePerson())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::ACTIVATED))
            ->setObject(TestAssessmentEntities::makeAssessment())
            ->setGenerated(TestAssignableEntities::makeAssessmentAttempt()
                ->setAssignable(TestAssessmentEntities::makeAssessment()))
            ->setEventTime(TestTimes::startedTime())
            ->setEdApp(TestAgentEntities::makeAssessmentApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setMembership(TestLisEntities::makeMembership()));
    }
}