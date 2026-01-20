<?php namespace LogExpander;
use \stdClass as PhpObj;
use Exception;

class Repository extends PhpObj {
    protected $store;
    protected $cfg;

    /**
     * Constructs a new Repository.
     * @param $store
     * @param PhpObj $cfg
     */
    public function __construct($store, PhpObj $cfg) {
        $this->store = $store;
        $this->cfg = $cfg;
    }

    /**
     * Reads an object from the store with the given type and query.
     * @param String $type
     * @param [String => Mixed] $query
     * @return PhpObj
     */
    protected function readStoreRecord($type, array $query) {
        $model = $this->store->get_record($type, $query);
        if ($model === false) {
            throw new Exception('Record not found.');
        }
        return $model;
    }

    /**
     * Reads an array of objects from the store with the given type and query.
     * @param String $type
     * @param [String => Mixed] $query
     * @return PhpArr
     */
    protected function readStoreRecords($type, array $query) {
        $model = $this->store->get_records($type, $query);
        return $model;
    }

    /**
     * Calls the Moodle core fullname function
     * @param PHPObj $user
     * @return Str
     */
    protected function fullname($user) {
        return fullname($user);
    }

    /**
     * Reads an object from the store with the given id.
     * @param String $id
     * @param String $type
     * @return PhpObj
     */
    public function readObject($id, $type) {
        $model = $this->readStoreRecord($type, ['id' => $id]);
        $model->type = $type;
        return $model;
    }

    /**
     * Reads an object from the store with the given id.
     * @param String $id
     * @param String $type
     * @return PhpObj
     */
    public function readModule($id, $type) {
        $model = $this->readObject($id, $type);
        $module = $this->readStoreRecord('modules', ['name' => $type]);
        $course_module = $this->readStoreRecord('course_modules', [
            'instance' => $id,
            'module' => $module->id,
            'course' => $model->course
        ]);
        $model->url = $this->cfg->wwwroot . '/mod/'.$type.'/view.php?id=' . $course_module->id;
        return $model;
    }

    /**
     * Reads a quiz attempt from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readAttempt($id) {
        $model = $this->readObject($id, 'quiz_attempts');
        $model->url = $this->cfg->wwwroot . '/mod/quiz/attempt.php?attempt='.$id;
        $model->name = 'Attempt '.$id;
        return $model;
    }

    /**
     * Reads question attempts from the store with the given quiz attempt id.
     * @param String $id
     * @return PhpArr
     */
    public function readQuestionAttempts($id) {
        $questionAttempts = $this->readStoreRecords('question_attempts', ['questionusageid' => $id]);
        foreach ($questionAttempts as $questionIndex => $questionAttempt) {
            $questionAttemptSteps = $this->readStoreRecords('question_attempt_steps', ['questionattemptid' => $questionAttempt->id]);
            foreach ($questionAttemptSteps as $stepIndex => $questionAttemptStep) {
                $questionAttemptStep->data = $this->readStoreRecords('question_attempt_step_data', ['attemptstepid' => $questionAttemptStep->id]);
            }
            $questionAttempt->steps = $questionAttemptSteps;
        }
        return $questionAttempts;
    }

    /**
     * Reads questions from the store with the given quiz id.
     * @param String $id
     * @return PhpArr
     */
    public function readQuestions($quizId) {
        $quizSlots = $this->readStoreRecords('quiz_slots', ['quizid' => $quizId]);
        $questions = [];
        foreach ($quizSlots as $index => $quizSlot) {
            try {
                $question = $this->readStoreRecord('question', ['id' => $quizSlot->questionid]);
                $question->answers = $this->readStoreRecords('question_answers', ['question' => $question->id]);
                $question->url = $this->cfg->wwwroot . '/mod/question/question.php?id='.$question->id;
                $questions[$question->id] = $question;
            }
            catch (\Exception $e) {
                // Question not found; maybe it was deleted since the event. 
                // Don't add the question to the list, but also don't block the attempt event.
            }
        }

        return $questions;
    }

    /**
     * Reads  grade metadata from the store with the given type and id.
     * @param String $id
     * @param String $type
     * @return PhpObj
     */
    public function readGradeItems($id, $type) {
        return $this->readStoreRecord('grade_items', ['itemmodule' => $type, 'iteminstance' => $id]);
    }

    /**
     * Reads assignemnt grade comment from the store for a given grade and assignment id
     * @param String $id
     * @return PhpObj
     */
    public function readGradeComment($grade_id, $assignment_id) {
        $model = $this->readStoreRecord(
            'assignfeedback_comments', 
            [
                'assignment' => $assignment_id, 
                'grade' => $grade_id
            ]
        );
        return $model;
    }
    
    /**
     * Reads a feedback attempt from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readFeedbackAttempt($id) {
        $model = $this->readObject($id, 'feedback_completed');
        $model->url = $this->cfg->wwwroot . '/mod/feedback/complete.php?id='.$id;
        $model->name = 'Attempt '.$id;
        $model->responses = $this->readStoreRecords('feedback_value', ['completed' => $id]);
        return $model;
    }

    /**
     * Reads questions from the store with the given feedback id.
     * @param String $id
     * @return PhpArr
     */
    public function readFeedbackQuestions($id) {
        $questions = $this->readStoreRecords('feedback_item', ['feedback' => $id]);
        foreach ($questions as $index => $question) {
            $question->template = $this->readStoreRecord('feedback_template', ['id' => $question->template]);
            $question->url = $this->cfg->wwwroot . '/mod/feedback/edit_item.php?id='.$question->id;
            $questions[$index] = $question;
        }
        return $questions;
    }

    /**
     * Reads a course from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readCourse($id) {
        $model = $this->readObject($id, 'course');
        $model->url = $this->cfg->wwwroot.($id > 0 ? '/course/view.php?id=' . $id : '');
        return $model;
    }

    /**
     * Reads a user from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readUser($id) {
        $model = $this->readObject($id, 'user');
        $model->url = $this->cfg->wwwroot;
        $model->fullname = $this->fullname($model);
        return $model;
    }

    /**
     * Reads a discussion from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readDiscussion($id) {
        $model = $this->readObject($id, 'forum_discussions');
        $model->url = $this->cfg->wwwroot . '/mod/forum/discuss.php?d=' . $id;
        return $model;
    }

    /**
     * Reads the Moodle release number.
     * @return String
     */
    public function readRelease() {
        return $this->cfg->release;
    }

    /**
     * Reads the Moodle site
     * @return PhpObj
     */
    public function readSite() {
        $model = $this->readCourse(1);
        $model->url = $this->cfg->wwwroot;
        $model->type = "site";
        return $model;
    }
}
