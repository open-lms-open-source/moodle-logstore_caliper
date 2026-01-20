<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class AssessmentItemStartedEventTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperAssessmentItemStartedEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\AssessmentItemEvent())
            ->setActor(TestAgentEntities::makePerson())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::STARTED))
            ->setObject(TestAssessmentEntities::makeAssessmentItem())
            ->setGenerated(TestAssignableEntities::makeItemAttempt())
            ->setEventTime(TestTimes::startedTime())
            ->setEdApp(TestAgentEntities::makeAssessmentApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setMembership(TestLisEntities::makeMembership()));
    }
}
