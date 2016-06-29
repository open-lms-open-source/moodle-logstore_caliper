<?php

class TestAgentEntities {
    /** @return SoftwareApplication */
    public static function makeAssessmentApplication() {
        return (new IMSGlobal\Caliper\entities\agent\SoftwareApplication('https://example.com/super-assessment-tool'))
            ->setName('Super Assessment Tool')
            ->setDateCreated(TestTimes::createdTime());
    }

    public static function makeMediaApplication() {
        return (new IMSGlobal\Caliper\entities\agent\SoftwareApplication('https://example.com/super-media-tool'))
            ->setName('Super Media Tool')
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime());
    }

    /** @return Person */
    public static function makePerson() {
        return (new IMSGlobal\Caliper\entities\agent\Person('https://example.edu/user/554433'))
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime());
    }

    /** @return SoftwareApplication */
    public static function makeReadingApplication() {
        return (new IMSGlobal\Caliper\entities\agent\SoftwareApplication('https://example.com/viewer'))
            ->setName('ePub')
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime());
    }

    /** @return array */
    public static function makeWithAgents() {
        return [
            (new IMSGlobal\Caliper\entities\agent\Person('https://example.edu/user/657585'))
                ->setDateCreated(TestTimes::createdTime())
                ->setDateModified(TestTimes::modifiedTime()),
            (new IMSGlobal\Caliper\entities\agent\Person('https://example.edu/user/667788'))
                ->setDateCreated(TestTimes::createdTime())
                ->setDateModified(TestTimes::modifiedTime())
        ];
    }
}