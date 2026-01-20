<?php

class TestLisEntities {
    public static function groupId() {
        return 'https://example.edu/politicalScience/2015/american-revolution-101/section/001/group/001';
    }

    public static function makeGroup() {
        return (new IMSGlobal\Caliper\entities\lis\Group(TestLisEntities::groupId()))
            ->setName('Discussion Group 001')
            ->setSubOrganizationOf(TestLisEntities::makeCourseSection())
            ->setDateCreated(TestTimes::createdTime());
    }

    public static function makeGroupMembership() {
        return (new IMSGlobal\Caliper\entities\lis\Membership('https://example.edu/membership/003'))
            ->setMember(TestAgentEntities::makePerson())
            ->setOrganization(TestLisEntities::groupId())
            ->setRoles(TestLisEntities::makeMembership()->getRoles())
            ->setDateCreated(TestTimes::createdTime());
    }

    public static function makeCourseSection() {
        return (new IMSGlobal\Caliper\entities\lis\CourseSection(TestLisEntities::courseSectionId()))
            ->setCourseNumber('POL101')
            ->setName('American Revolution 101')
            ->setAcademicSession('Fall-2015')
            ->setSubOrganizationOf(TestLisEntities::makeCourseOffering())
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime());
    }

    public static function courseSectionId() {
        return 'https://example.edu/politicalScience/2015/american-revolution-101/section/001';
    }

    public static function makeSectionMembership() {
        return (new IMSGlobal\Caliper\entities\lis\Membership('https://example.edu/membership/002'))
            ->setMember(TestAgentEntities::makePerson())
            ->setOrganization(TestLisEntities::courseSectionId())
            ->setRoles(TestLisEntities::makeMembership()->getRoles())
            ->setDateCreated(TestTimes::createdTime());

    }

    public static function makeMembership() {
        return (new IMSGlobal\Caliper\entities\lis\Membership('https://example.edu/politicalScience/2015/american-revolution-101/roster/554433'))
            ->setDateCreated(TestTimes::createdTime())
            ->setDescription('Roster entry')
            ->setMember(TestAgentEntities::makePerson())
            ->setName('American Revolution 101')
            ->setOrganization(new IMSGlobal\Caliper\entities\lis\Group('https://example.edu/politicalScience/2015/american-revolution-101/section/001'))
            ->setRoles(new IMSGlobal\Caliper\entities\lis\Role(IMSGlobal\Caliper\entities\lis\Role::LEARNER))
            ->setStatus(new IMSGlobal\Caliper\entities\lis\Status(IMSGlobal\Caliper\entities\lis\Status::ACTIVE));
    }

    public static function makeCourseOffering() {
        return (new IMSGlobal\Caliper\entities\lis\CourseOffering('https://example.edu/politicalScience/2015/american-revolution-101'))
            ->setCourseNumber('POL101')
            ->setName('Political Science 101: The American Revolution')
            ->setAcademicSession('Fall-2015')
            ->setDateCreated(TestTimes::createdTime())
            ->setDateModified(TestTimes::modifiedTime());
    }
}