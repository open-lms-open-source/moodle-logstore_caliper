<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file contains ...
 *
 * @package    logstore_caliper
 * @copyright  2016 Moodlerooms Inc. http://www.moodlerooms.com
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_caliper\local\RecipeEmitter;

use \IMSGlobal\Caliper\entities\agent;
use \IMSGlobal\Caliper\entities\session;
use \IMSGlobal\Caliper\entities\lis;

class Controller extends \stdClass {
    protected $repo;
    public static $routes = [
        'course_viewed' => 'CourseViewed',
        'module_viewed' => 'ModuleViewed',
        'user_loggedin' => 'UserLoggedin',
        'user_loggedout' => 'UserLoggedout',
        'assignment_submitted' => 'AssignmentSubmitted',
        'assignment_graded' => 'AssignmentGraded',
        'attempt_started' => 'AttemptStarted',
        'attempt_completed' => 'AttemptCompleted',
    ];

    /**
     * Constructs a new Controller.
     * @param Repository $repo
     */
    public function __construct(Repository $repo) {
        $this->repo = $repo;
    }

    /**
     * Creates a new event.
     * @param [String => Mixed] $translatorevent
     * @return [String => Mixed]
     */
    public function create_event(array $translatorevent) {
        global $CFG;

        $route = isset($translatorevent['recipe']) ? $translatorevent['recipe'] : '';
        if (isset(static::$routes[$route])) {
            $event = '\logstore_caliper\local\RecipeEmitter\Events\\'.static::$routes[$route];
            $caliperevent = new $event($translatorevent);
            $t = new \DateTime($translatorevent['time']);
            $edapp = new agent\SoftwareApplication($CFG->wwwroot);
            $edapp->setName($translatorevent['app_name'])->setDescription($translatorevent['app_description']);
            $person = new agent\Person($translatorevent['user_id']);
            $person->setName($translatorevent['user_name']);
            $session = new session\Session($translatorevent['session_id']);
            $session->setActor($person);
            $caliperevent->setEdApp($edapp)->setActor($person)->setFederatedSession($session)->setEventTime($t);
            if (!empty($translatorevent['roles'])) {
                $course = new lis\CourseSection($translatorevent['course_id']);
                $course->setName($translatorevent['course_name']);
                $course->setDescription($translatorevent['course_description']);
                $course->setCourseNumber($translatorevent['course_number']);
                $membership = new lis\Membership($translatorevent['member']);
                $membership->setMember($person)->setOrganization($course)->setRoles($translatorevent['roles']);
                $membership->setStatus(new lis\Status(lis\Status::ACTIVE));
                $caliperevent->setGroup($course)->setMembership($membership);
            }
            $this->repo->create_event($caliperevent);
        }
    }
}
