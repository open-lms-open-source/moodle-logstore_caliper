# Caliper log store Tool
The Caliper Logstore component uses the Moodle Logging interface 
to capture user events and emit them to a Caliper event store. 
The Caliper Framework is a specification from IMS Global which 
provides a data representation of learning activities and an API
for transmitting these to an event store for later analysis. 
Metric profiles are used to describe different types of learning
activity, allowing representations to be matched against the 
nature of the activity. Events may be sent immediately to the
event store, or captured for sending later in batches.

![logstore_caliper](https://moodle.org/pluginfile.php/50/local_plugins/plugin_screenshots/1674/logstore_caliper.png)

This plugin was contributed by the Open LMS Product Development team. Open LMS is an education technology company
dedicated to bringing excellent online teaching to institutions across the globe.  We serve colleges and universities,
schools and organizations by supporting the software that educators use to manage and deliver instructional content to
learners in virtual classrooms.

## Installation
Extract the contents of the plugin into _/wwwroot/admin/tool/log/store_ then visit `admin/upgrade.php` or use the CLI script to upgrade your site.

The component can be installed onto a Moodle 2.7+ instance as follows:

1. Download the component.
2. Log into your instance of Moodle as a System Administrator.
3. Go to /admin/tool/installaddon/ on your Moodle instance.
4. Drag and drop your download from step 1.
5. Click Install plugin from the ZIP file.
6. Click Install plugin!.
7. Click Upgrade Moodle database now.
8. Click Continue.
9. Complete the component's settings page:
    * Event Store URL;
    * API Key;
    * Send statements immediately to event store?;
    * Batch size.
10. Click Save changes.
11. Go to /admin/settings.php?section=managelogging on your Moodle instance.
12. Enable the Caliper log store component (use the Settings option to update the component's settings values).

If zip installation is disabled, you can unzip the zip file to _/admin/tool/log/store_ instead of steps 3 to 5 above.

## How does it work?
The component adopts the same implementation method as the logstore component for [xAPI](https://moodle.org/plugins/logstore_xapi)
It is made up of three parts: an [Expander](https://moodle.org/plugins/logstore_xapi), a Translator, and an Emitter. 
Each log entry follows a six step process before finally reaching the event store:

* The component passes the log entry from the logstore_standard_log to the Expander.
* The Expander expands the log entry with data from the Moodle database.
* The component passes the expanded event from to the Translator.
* The Translator translates the expanded event to Caliper metric profile options.
* The component passes the translated event to the Emitter.
* The Emitter emits the event to the event store using the Caliper Sensor API.

For more information about its usage, please see https://docs.moodle.org/dev/Caliper.

## License
Copyright (c) 2021 Open LMS (https://www.openlms.net)

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <http://www.gnu.org/licenses/>.
