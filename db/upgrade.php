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
 * Caliper log store upgrade.
 *
 * @package    logstore_caliper
 * @copyright  2016 MoodleRooms
 * @author     Stephen Vickers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_logstore_caliper_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2016061402) {

        $table = new xmldb_table('logstore_caliper_log');

        // Define index course-time (not unique) to be dropped form logstore_caliper_log.
        $index = new xmldb_index('course-time', XMLDB_INDEX_NOTUNIQUE, array('courseid', 'anonymous', 'timecreated'));
        // Conditionally launch drop index course-time.
        if ($dbman->index_exists($table, $index)) {
            $dbman->drop_index($table, $index);
        }

        // Define index user-module (not unique) to be dropped form logstore_caliper_log.
        $index = new xmldb_index('user-module', XMLDB_INDEX_NOTUNIQUE,
            array('userid', 'contextlevel', 'contextinstanceid', 'crud', 'edulevel', 'timecreated'));
        // Conditionally launch drop index user-module.
        if ($dbman->index_exists($table, $index)) {
            $dbman->drop_index($table, $index);
        }

        // Delete unused fields.
        $field = new xmldb_field('component');
        // Conditionally launch drop field component.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('action');
        // Conditionally launch drop field action.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('target');
        // Conditionally launch drop field target.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('crud');
        // Conditionally launch drop field crud.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('edulevel');
        // Conditionally launch drop field edulevel.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('contextid');
        // Conditionally launch drop field contextid.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('contextlevel');
        // Conditionally launch drop field contextlevel.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('contextinstanceid');
        // Conditionally launch drop field contextinstanceid.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('anonymous');
        // Conditionally launch drop field anonymous.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('origin');
        // Conditionally launch drop field origin.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('ip');
        // Conditionally launch drop field ip.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }
        $field = new xmldb_field('realuserid');
        // Conditionally launch drop field realuserid.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }

        // Define field roles to be added to logstore_standard_log.
        $field = new xmldb_field('roles', XMLDB_TYPE_TEXT, null, null, null, null, null, 'other');
        // Conditionally launch add field roles.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Standard savepoint reached.
        upgrade_plugin_savepoint(true, 2016061402, 'logstore', 'caliper');
    }

    return true;
}
