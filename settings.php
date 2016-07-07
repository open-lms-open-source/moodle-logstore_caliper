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
 * External Caliper log store plugin
 *
 * @package    logstore_caliper
 * @copyright  2016 Moodlerooms Inc. http://www.moodlerooms.com
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    // Endpoint.
    $settings->add(new admin_setting_configtext('logstore_caliper/endpoint',
        get_string('endpoint', 'logstore_caliper'), '',
        '', PARAM_URL));

    // API Key.
    $settings->add(new admin_setting_configtext('logstore_caliper/apikey',
        get_string('apikey', 'logstore_caliper'), '', '', PARAM_TEXT));

    // Switch background batch mode off.
    $settings->add(new admin_setting_configcheckbox('logstore_caliper/immediatemode',
        get_string('immediatemode', 'logstore_caliper'),
        get_string('immediatemode_desc', 'logstore_caliper'), 0));

    // Number of events to send at a time in batch mode.
    $settings->add(new admin_setting_configselect('logstore_caliper/batchsize',
        get_string('batchsize', 'logstore_caliper'),
        get_string('batchsize_desc', 'logstore_caliper'), '1',
        array('1' => '1', '5' => '5', '10' => '10', '25' => '25', '50' => '50', '100' => '100', '200' => '200')));

}
