<?php

/**
 * @requires PHP 5.4
 */
class ApiTest extends PHPUnit_Framework_TestCase {

    function setUp() {
        date_default_timezone_set('UTC');
        $this->markTestSkipped('Fix these tests to use a readily available server or setup/mock their own server');
        IMSGlobal\Caliper\Sensor::init("testapiKey");
    }

    /**
     * @group caliper
     */
    function testDescribe() {
    	$this->markTestSkipped('Fix this test to not instantiate abstract class Entity()');
        $caliperEntity = new IMSGlobal\Caliper\entities\Entity();
        $caliperEntity->setId("course-1234");
        $caliperEntity->setType("course");
        $caliperEntity->setProperties(array(
            "program" => "Engineering",
            "start-date" => time(),
        ));

        $described = IMSGlobal\Caliper\Sensor::describe($caliperEntity);
        $this->assertTrue($described);
    }

    /**
     * @group caliper
     */
    function testSend() {
    	$this->markTestSkipped('Fix this test to not instantiate Event()');
        $caliperEvent = new IMSGlobal\Caliper\events\Event();
        $caliperEvent->setAction("HILIGHT");
        $caliperEvent->setLearningContext(array(
            "courseId" => "course-1234",
            "userId" => "user-1234",
        ));

        $sent = IMSGlobal\Caliper\Sensor::send($caliperEvent);
        $this->assertTrue($sent);
    }
}
