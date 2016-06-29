<?php

class TestMediaEntities {
    public static function videoId() {
        return 'https://example.com/super-media-tool/video/1225';
    }

    public static function makeMediaLocation() {
        return (new IMSGlobal\Caliper\entities\media\MediaLocation(TestMediaEntities::videoId()))
            ->setDateCreated(TestTimes::createdTime())
            ->setCurrentTime(710)
            ->setVersion('1.0');
    }

    public static function makeVideoObject() {
        return (new IMSGlobal\Caliper\entities\media\VideoObject(TestMediaEntities::videoId()))
            ->setName('American Revolution - Key Figures Video')
            ->setAlignedLearningObjectives(TestEntities::makeLearningObjective())
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime())
            ->setDuration(1420)
            ->setVersion('1.0');
    }
}