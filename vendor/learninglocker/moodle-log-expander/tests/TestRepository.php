<?php namespace LogExpander\Tests;
use \LogExpander\Repository as MoodleRepository;

class TestRepository extends MoodleRepository {
    /**
     * Reads an object from the store with the given id.
     * @param string $type
     * @param [string => mixed] $query
     * @return php_obj
     * @override MoodleRepository
     */
    protected function readStoreRecord($type, array $query) {
         $response = [
            'id' => '1',
            'username' => 'test_username',
            'lang' => 'en',
            'fullname' => 'test_fullname',
            'summary' => 'test_summary',
            'name' => 'test_name',
            'intro' => 'test_intro',
            'timestart' => 1433946701,
            'timefinish' => 1433946702,
            'timestamp' => 1433946702,
            'timecreated' => 1433946702,
            'state' => 'finished',
            'course' => '1',
            'sumgrades' => '1',
            'grade' => '2',
            'quiz' => '1',
            'assignment' => '1',
            'userid' => '1',
            'forum' => '1',
            'type' => 'object',
            'scorm' => '1',
            'feedback' => '1',
            'template' => '1',
            'grademax' => '5.00000',
            'grademin' => '0.00000',
            'gradepass' => '5.00000',
            'commenttext' => '<p>test comment</p>',
            'questionid' => '1',
            'questiontext' => '<p>test question</p>',
            'qtype' => 'multichoice',
            'maxmark' => '5.00000',
            'fraction' => '1.0000',
            'answer' => 'test answer',
            'rightanswer' => 'test answer',
            'responsesummary' => 'test answer',
            'sequencenumber' => 1,
            'item' => '1',
            'presentation' => 'r>>>>>0#### incorrect|1#### correct',
            'typ' => 'multichoicerated',
            'value' =>  '2',
            'timemodified' => 1433946702,
        ];

        if ($type == 'question_attempt_steps') {
            $response['state'] = 'gradedright';
        }

        return (object) $response;
    }

    /**
     * Reads an array of objects from the store with the given type and query.
     * @param String $type
     * @param [String => Mixed] $query
     * @return PhpArr
     * @override MoodleRepository
     */
    protected function readStoreRecords($type, array $query) {
        $record1 = $this->readStoreRecord($type, $query);
        $record2 = $this->readStoreRecord($type, $query);
        $record2->id = '2';
        $record2->questionid = '1';
        $record2->sequencenumber = '2';
        return [
            "1" => $record1,
            "2" => $record2
        ];
    }

    protected function fullname($user) {
        return "test_fullname";
    }

    /**
     * Reads an object from the store with the given id.
     * @param string $id
     * @param string $type
     * @return php_obj
     */
    public function readObject($id, $type) {
        $model = $this->readStoreRecord($type, ['id' => $id]);
        $model->id = $id;
        return $model;
    }
}
