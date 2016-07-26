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
 * This file contains the class representing an Attempt Completed event.
 *
 * @package    logstore_caliper
 * @copyright  2016 Moodlerooms Inc. http://www.moodlerooms.com
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_caliper\local\Translator\Events;

defined('MOODLE_INTERNAL') || die();

/**
 * This file contains the class representing a Attempt Completed event.
 *
 * @package    logstore_caliper
 * @copyright  2016 Moodlerooms Inc. http://www.moodlerooms.com
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class AttemptCompleted extends Event {
    /**
     * Reads data for an event.
     * @param array $expandedevent
     * @return array
     */
    public function read(array $expandedevent) {
        return array_merge(parent::read($expandedevent), [
            'recipe' => 'attempt_completed',
            'assignment_id' => $expandedevent['module']->url,
            'assignment_name' => $expandedevent['module']->name,
            'assignment_description' => $expandedevent['module']->intro,
            'attempt_id' => $expandedevent['attempt']->url,
            'attemptnumber' => $expandedevent['attempt']->attempt,
            'timeopen' => date('c', $expandedevent['module']->timeopen),
            'timeclose' => date('c', $expandedevent['module']->timeclose),
            'attempts' => $expandedevent['module']->attempts,
            'grade' => $expandedevent['module']->grade,
        ]);
    }
}