#JSON Output Files for Debugging

The tests can save formatted and sorted copies of the JSON from the fixture
files and the serialized Caliper objects if the environment variable
`PHPUNIT_OUTPUT_DIR` is set to the name of a writable directory.  They will
be saved in files with the names  `NameOfTest_fixture.json` and
`NameOfTest_output.json`.

##Examples

When using a BASH shell on UNIX/Linux, to set the variable for only the
current run of PHPUnit:

    $ PHPUNIT_OUTPUT_DIR=/tmp phpunit test #run all tests
    $ PHPUNIT_OUTPUT_DIR=/tmp phpunit test/caliper/event/NavigationEventTest.php #run specific test
    $ ls /tmp/NavigationEventTest*.json
    /tmp/NavigationEventTest_fixture.json
    /tmp/NavigationEventTest_output.json

To set the variable once for many runs of PHPUnit:

    $ PHPUNIT_OUTPUT_DIR=/tmp; export PHPUNIT_OUTPUT_DIR
    $ phpunit test #run all tests
    $ phpunit test/caliper/event/NavigationEventTest.php #run specific test
    $ ls /tmp/NavigationEventTest*.json
    /tmp/NavigationEventTest_fixture.json
    /tmp/NavigationEventTest_output.json

Both JSON files from each test are formatted and sorted in the same way so
they are easy to compare and find differences.
