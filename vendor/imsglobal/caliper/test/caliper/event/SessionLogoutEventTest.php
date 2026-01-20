<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class SessionLogoutEventTest extends CaliperTestCase{
    function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperSessionLogoutEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\SessionEvent())
            ->setActor(TestAgentEntities::makePerson())
            ->setMembership(TestLisEntities::makeMembership())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::LOGGED_OUT))
            ->setObject(TestAgentEntities::makeReadingApplication())
            ->setTarget(TestSessionEntities::makeSession()
                ->setEndedAtTime(TestTimes::endedTime())
                ->setDuration(TestTimes::durationSeconds()))
            ->setEdApp(TestAgentEntities::makeReadingApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setEventTime(TestTimes::startedTime()));
    }
}