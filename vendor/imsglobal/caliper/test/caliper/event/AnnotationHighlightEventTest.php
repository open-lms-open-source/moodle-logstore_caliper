<?php
require_once realpath(dirname(__FILE__) . '/../CaliperTestCase.php');

/**
 * @requires PHP 5.4
 */
class AnnotationHighlightEventTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setFixtureFilename('/../../caliper-common-fixtures/src/test/resources/fixtures/caliperHighlightAnnotationEvent.json');

        $this->setTestObject((new IMSGlobal\Caliper\events\AnnotationEvent())
            ->setActor(TestAgentEntities::makePerson())
            ->setAction(new IMSGlobal\Caliper\actions\Action(IMSGlobal\Caliper\actions\Action::HIGHLIGHTED))
            ->setObject(TestReadingEntities::makeFrame1())
            ->setGenerated(TestAnnotationEntities::makeHighlightAnnotation())
            ->setEventTime(TestTimes::startedTime())
            ->setEdApp(TestAgentEntities::makeReadingApplication())
            ->setGroup(TestLisEntities::makeGroup())
            ->setMembership(TestLisEntities::makeMembership()));
    }
}