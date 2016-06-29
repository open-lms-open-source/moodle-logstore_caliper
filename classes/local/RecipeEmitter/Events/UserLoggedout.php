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

namespace logstore_caliper\local\RecipeEmitter\Events;

use \IMSGlobal\Caliper\events;
use \IMSGlobal\Caliper\actions;
use \IMSGlobal\Caliper\entities\agent;

class UserLoggedout extends events\SessionEvent {

    public function __construct($translatorevent) {
        global $CFG;

        parent::__construct();
        $this->setAction(new actions\Action(actions\Action::LOGGED_OUT));
        $edapp = new agent\SoftwareApplication($CFG->wwwroot);
        $edapp->setName($translatorevent['app_name'])->setDescription($translatorevent['app_description']);
        $this->setObject($edapp);
    }

}