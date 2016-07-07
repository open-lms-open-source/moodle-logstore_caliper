<?php


class TestUtilities {
    public static function saveFormattedFixtureAndOutputJson($fixtureFilePath, $outputJsonString, $filenamePrefix) {
        $outputDir = getenv('PHPUNIT_OUTPUT_DIR');
        if ($outputDir != FALSE) {
            // Converting JSON string back to object avoids property access problems.
            $caliperObjects = json_decode($outputJsonString);
            self::ksortObjectsRecursive($caliperObjects);
            $caliperJson = json_encode($caliperObjects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

            file_put_contents(realpath($outputDir) . DIRECTORY_SEPARATOR . $filenamePrefix . '_output.json',
                $caliperJson);

            $fixtureJson = file_get_contents($fixtureFilePath);

            $jsonObjects = json_decode($fixtureJson);

            self::ksortObjectsRecursive($jsonObjects);

            $jsonString = json_encode($jsonObjects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            file_put_contents(realpath($outputDir) . DIRECTORY_SEPARATOR . $filenamePrefix . '_fixture.json',
                $jsonString);
        }

    }

    public static function ksortObjectsRecursive(&$data, $sortFlags = SORT_REGULAR) {
        if (!function_exists('ksortObjectsRecursiveCallback')) {
            function ksortObjectsRecursiveCallback(&$data, $unusedKey, $sortFlags) {
                $dataWasCastAsArray = false;
                if (is_object($data)) {
                    $data = (array)$data;
                    $dataWasCastAsArray = true;
                }

                $success = is_array($data) &&
                    ksort($data, $sortFlags) &&
                    array_walk($data, __FUNCTION__, $sortFlags);

                if ($dataWasCastAsArray) {
                    $object = new stdClass();
                    foreach ($data as $key => $value) {
                        $object->$key = $value;
                    }
                    $data = $object;
                }
                return $success;
            }
        }

        return ksortObjectsRecursiveCallback($data, null, $sortFlags);
    }

}