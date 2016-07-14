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
 * Log expander controller.
 *
 * @package   logstore_caliper
 * @copyright Copyright (c) 2016 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_caliper;

use LogExpander\Controller;
use LogExpander\Repository;

defined('MOODLE_INTERNAL') || die();

/**
 * Log expander controller.
 *
 * @package   logstore_caliper
 * @copyright Copyright (c) 2016 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class log_expander_controller extends Controller {
    /**
     * Constructs a new controller.
     * @param Repository $repo
     */
    public function __construct(Repository $repo) {
        parent::__construct($repo);
        static::$routes['\mod_quiz\event\attempt_started'] = 'AttemptEvent';
        static::$routes['\mod_quiz\event\attempt_submitted'] = 'AttemptEvent';
    }
}