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
 * This file contains the Controller class for translating Moodle events
 *
 * @package    logstore_caliper
 * @copyright  2016 Blackboard Inc. (http://www.blackboardopenlms.com)
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_caliper\local\Translator;

/**
 * This file contains the Controller class for translating Moodle events
 *
 * @package    logstore_caliper
 * @copyright  2016 Blackboard Inc. (http://www.blackboardopenlms.com)
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class Controller extends \stdClass {

    /** @var array Mapping of Moodle URLs to event types. */
    public static $routes = [
        '\core\event\course_viewed' => 'CourseViewed',
        '\mod_page\event\course_module_viewed' => 'ModuleViewed',
        '\mod_quiz\event\course_module_viewed' => 'ModuleViewed',
        '\mod_url\event\course_module_viewed' => 'ModuleViewed',
        '\mod_folder\event\course_module_viewed' => 'ModuleViewed',
        '\mod_forum\event\course_module_viewed' => 'ModuleViewed',
        '\mod_forum\event\user_report_viewed' => 'ModuleViewed',
        '\mod_book\event\course_module_viewed' => 'ModuleViewed',
        '\mod_scorm\event\course_module_viewed' => 'ModuleViewed',
        '\mod_resource\event\course_module_viewed' => 'ModuleViewed',
        '\mod_choice\event\course_module_viewed' => 'ModuleViewed',
        '\mod_data\event\course_module_viewed' => 'ModuleViewed',
        '\mod_feedback\event\course_module_viewed' => 'ModuleViewed',
        '\mod_lesson\event\course_module_viewed' => 'ModuleViewed',
        '\mod_lti\event\course_module_viewed' => 'ModuleViewed',
        '\mod_wiki\event\course_module_viewed' => 'ModuleViewed',
        '\mod_workshop\event\course_module_viewed' => 'ModuleViewed',
        '\mod_chat\event\course_module_viewed' => 'ModuleViewed',
        '\mod_glossary\event\course_module_viewed' => 'ModuleViewed',
        '\mod_imscp\event\course_module_viewed' => 'ModuleViewed',
        '\mod_survey\event\course_module_viewed' => 'ModuleViewed',
        '\mod_facetoface\event\course_module_viewed' => 'ModuleViewed',
        '\mod_quiz\event\attempt_viewed' => 'ModuleViewed',
        '\core\event\user_loggedin' => 'UserLoggedin',
        '\core\event\user_loggedout' => 'UserLoggedout',
        '\mod_assign\event\assessable_submitted' => 'AssignmentSubmitted',
        '\mod_assign\event\submission_graded' => 'AssignmentGraded',
        '\mod_quiz\event\attempt_started' => 'AttemptStarted',
        '\mod_quiz\event\attempt_submitted' => 'AttemptCompleted',
        '\mod_quiz\event\attempt_reviewed' => 'ModuleViewed',
    ];

    /**
     * Constructs a new Controller.
     */
    public function __construct() {
    }

    /**
     * Creates a new event.
     * @param array $expandedevent  Event array
     * @return array
     */
    public function create_event(array $expandedevent) {
        $route = isset($expandedevent['event']['eventname']) ? $expandedevent['event']['eventname'] : '';
        if (isset(static::$routes[$route])) {
            $translatorevent = '\logstore_caliper\local\Translator\Events\\'.static::$routes[$route];
            return (new $translatorevent())->read($expandedevent);
        } else {
            return null;
        }
    }
}
