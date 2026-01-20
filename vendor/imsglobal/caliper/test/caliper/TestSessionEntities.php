<?php

class TestSessionEntities {
    public static function makeSession() {
        return (new IMSGlobal\Caliper\entities\session\Session('https://example.com/viewer/session-123456789'))
            ->setName('session-123456789')
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime())
            ->setActor(TestAgentEntities::makePerson())
            ->setStartedAtTime(TestTimes::startedTime());
    }
}