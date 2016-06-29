<?php namespace LogExpander\Tests;
use \LogExpander\Events\AttemptEvent as Event;

class AttemptEventTest extends EventTest {
    /**
     * Sets up the tests.
     * @override TestCase
     */
    public function setup() {
        $this->event = new Event($this->repo);
    }

    protected function constructInput() {
        return array_merge(parent::constructInput(), [
            'objecttable' => 'quiz_attempts',
            'objectid' => 1,
            'eventname' => '\mod_quiz\event\attempt_preview_started',
        ]);
    }

    protected function assertOutput($input, $output) {
        parent::assertOutput($input, $output);
        $this->assertModule(1, $output['module'], 'quiz');
        $this->assertAttempt($input['objectid'], $output['attempt']);
        $this->assertEquals(5, $output['grade_items']->gradepass);
        $this->assertEquals(5, $output['grade_items']->grademax);
        $this->assertEquals(0, $output['grade_items']->grademin);
        $this->assertEquals("1", $output['attempt']->questions["1"]->id);
        $this->assertEquals("2", $output['attempt']->questions["1"]->steps["2"]->id);
        $this->assertEquals("2", $output['attempt']->questions["1"]->steps["1"]->data["2"]->id);
        $this->assertEquals("1", $output['questions']["1"]->id);
    }
}
