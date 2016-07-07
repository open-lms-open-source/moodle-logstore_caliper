<?php

class TestEntities {
    public static function makeLearningObjective() {
        return (new IMSGlobal\Caliper\entities\LearningObjective('https://example.edu/american-revolution-101/personalities/learn'))
            ->setDateCreated(TestTimes::createdTime());
    }
}