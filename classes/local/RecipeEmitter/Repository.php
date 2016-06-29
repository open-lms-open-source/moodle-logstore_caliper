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

use \IMSGlobal\Caliper;

class Repository extends \stdClass {
    protected $sensor;

    private $events = array();
    private $batchsize;

    /**
     * Constructs a new Repository.
     * @param Caliper\Sensor $sensor
     * @param int $batchsize
     */
    public function __construct(Caliper\Sensor $sensor, $batchsize) {
        $this->sensor = $sensor;
        $this->batchsize = intval($batchsize);
    }

    /**
     * Creates an event in the store.
     * @param Caliper\events\Event $event
     */
    public function create_event($event) {
        $this->events[] = $event;
        if (count($this->events) >= $this->batchsize) {
            $this->sensor->send($this->sensor, $this->events);
            $this->events = array();
        }
    }

    /**
     * Flush any events to the store.
     */
    public function flush_events() {
        if (count($this->events) > 0) {
            $this->sensor->send($this->sensor, $this->events);
            $this->events = array();
        }
    }

}
