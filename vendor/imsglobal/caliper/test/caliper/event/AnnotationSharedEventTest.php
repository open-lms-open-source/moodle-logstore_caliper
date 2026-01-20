<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class AnnotationSharedEventTest extends CaliperTestCase {
	function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperSharedAnnotationEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\AnnotationEvent())
            ->setActor(TestAgentEntities::makePerson())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::SHARED))
            ->setObject(TestReadingEntities::makeFrame3())
            ->setGenerated(TestAnnotationEntities::makeSharedAnnotation())
            ->setEventTime(TestTimes::startedTime())
            ->setEdApp(TestAgentEntities::makeReadingApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setMembership(TestLisEntities::makeMembership()));
	}
}