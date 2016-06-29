<?php namespace LogExpander\Events;

class FeedbackSubmitted extends Event {
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {

        $attempt = $this->repo->readFeedbackAttempt($opts['objectid']); 

        return array_merge(parent::read($opts), [
            'module' => $this->repo->readModule($attempt->feedback, 'feedback'),
            'questions' => $this->repo->readFeedbackQuestions($attempt->feedback),
            'attempt' => $attempt,
        ]);
    }
}