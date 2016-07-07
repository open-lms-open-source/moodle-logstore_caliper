<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class SessionTimeoutEventTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperSessionTimeoutEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\SessionEvent())
            ->setActor(TestAgentEntities::makeReadingApplication())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::TIMED_OUT))
            ->setObject(TestSessionEntities::makeSession()
                ->setEndedAtTime(TestTimes::endedTime())
                ->setDuration(TestTimes::durationSeconds()))
            ->setEdApp(TestAgentEntities::makeReadingApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setEventTime(TestTimes::startedTime()));
    }
}