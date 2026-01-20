<?php

class TestAnnotationEntities {
    /** @return BookmarkAnnotation */
    public static function makeBookmarkAnnotation() {
        return (new IMSGlobal\Caliper\entities\annotation\BookmarkAnnotation('https://example.edu/bookmarks/00001'))
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime())
            ->setAnnotated(TestReadingEntities::makeFrame2())
            ->setBookmarkNotes('The Intolerable Acts (1774)--bad idea Lord North');
    }

    /** @return HighlightAnnotation */
    public static function makeHighlightAnnotation() {
        return (new IMSGlobal\Caliper\entities\annotation\HighlightAnnotation('https://example.edu/highlights/12345'))
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime())
            ->setAnnotated(TestReadingEntities::makeFrame1())
            ->setSelection((new IMSGlobal\Caliper\entities\annotation\TextPositionSelector())
                ->setStart('455')
                ->setEnd('489'))
            ->setSelectionText('Life, Liberty and the pursuit of Happiness');
    }

    /** @return SharedAnnotation */
    public static function makeSharedAnnotation() {
        return (new IMSGlobal\Caliper\entities\annotation\SharedAnnotation('https://example.edu/shared/9999'))
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime())
            ->setAnnotated(TestReadingEntities::makeFrame3())
            ->setWithAgents(TestAgentEntities::makeWithAgents());
    }

    /** @return TagAnnotation */
    public static function makeTagAnnotation() {
        return (new IMSGlobal\Caliper\entities\annotation\TagAnnotation('https://example.edu/tags/7654'))
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime())
            ->setAnnotated(TestReadingEntities::makeFrame4())
            ->setTags(["to-read", "1765", "shared-with-project-team"]);
    }
}