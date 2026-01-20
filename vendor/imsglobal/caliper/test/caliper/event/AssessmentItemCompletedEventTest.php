<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class AssessmentItemCompletedEventTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperAssessmentItemCompletedEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\AssessmentItemEvent())
            ->setActor(TestAgentEntities::makePerson())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::COMPLETED))
            ->setObject(TestAssessmentEntities::makeAssessmentItem())
            ->setGenerated(TestResponseEntities::makeFillinBlankResponse())
            ->setEventTime(TestTimes::startedTime())
            ->setEdApp(TestAgentEntities::makeAssessmentApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setMembership(TestLisEntities::makeMembership()));
    }
}