<?php
require_once 'C:\Users\svickers\htdocs\caliper2\vendor\autoload.php';

define('CALIPER_LIB_PATH', realpath(dirname(__FILE__) . '/..'));
set_include_path(get_include_path() . PATH_SEPARATOR . CALIPER_LIB_PATH);
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestAgentEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestAnnotationEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestAssessmentEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestAssignableEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestLisEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestMediaEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestReadingEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestRequests.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestResponseEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestSessionEntities.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/caliper/TestTimes.php');
require_once realpath(CALIPER_LIB_PATH . '/../test/util/TestUtilities.php');

class CaliperTestCase extends PHPUnit_Framework_TestCase {
    /** @var object */
    private $testObject;
    /** @var string */
    protected $fixtureFilename;

    /** @return object */
    public function getTestObject() {
        return $this->testObject;
    }

    /**
     * @param object $testObject
     * @return $this
     */
    public function setTestObject($testObject) {
        $this->testObject = $testObject;
        return $this;
    }

    /** @return string */
    public function getFixtureFilename() {
        return $this->fixtureFilename;
    }

    /**
     * @param string $fixtureFilename
     * @return $this
     */
    public function setFixtureFilename($fixtureFilename) {
        $this->fixtureFilename = $fixtureFilename;
        return $this;
    }

    function setUp() {
        parent::setUp();
        date_default_timezone_set('UTC');
    }

    function testObjectSerializesToJson() {
        $testJson = json_encode($this->getTestObject(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $testFixtureFilePath = realpath(CALIPER_LIB_PATH . $this->getFixtureFilename());
        TestUtilities::saveFormattedFixtureAndOutputJson($testFixtureFilePath, $testJson, get_called_class());

        $this->assertJsonStringEqualsJsonFile($testFixtureFilePath, $testJson);
    }
}