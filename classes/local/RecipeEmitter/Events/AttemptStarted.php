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
 * This file contains the class representing an Assessment Started event
 *
 * @package    logstore_caliper
 * @copyright  2016 Blackboard Inc. http://www.moodlerooms.com
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_caliper\local\RecipeEmitter\Events;

use \IMSGlobal\Caliper\entities\agent;
use \IMSGlobal\Caliper\events;
use \IMSGlobal\Caliper\entities\assignable;
use \IMSGlobal\Caliper\entities\assessment;
use \IMSGlobal\Caliper\actions;

/**
 * This file contains the class representing an Assessment Started event
 *
 * @package    logstore_caliper
 * @copyright  2016 Blackboard Inc. http://www.moodlerooms.com
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class AttemptStarted extends events\AssessmentEvent {

    /**
     * Constructs a new event instance.
     * @param array $translatorevent  Event array
     */
    public function __construct($translatorevent) {
        parent::__construct();
        $this->setAction(new actions\Action(actions\Action::STARTED));

        $target = new assessment\Assessment($translatorevent['assignment_id']);
        $target->setName($translatorevent['assignment_name']);
        $target->setDescription($translatorevent['assignment_description']);
        $t = new \DateTime($translatorevent['timeopen']);
        $target->setDateToStartOn($t);
        $t = new \DateTime($translatorevent['timeclose']);
        $target->setDateToSubmit($t);
        $target->setMaxScore(floatval($translatorevent['grade']));
        $target->setMaxAttempts(intval($translatorevent['attempts']));

        $this->setTarget($target);

        $object = new assignable\Attempt($translatorevent['attempt_id']);
        $person = new agent\Person($translatorevent['user_id']);
        $object->setActor($person);
        $object->setAssignable($target);
        $object->setCount(intval($translatorevent['attemptnumber']));
        $this->setObject($object);

    }

}
