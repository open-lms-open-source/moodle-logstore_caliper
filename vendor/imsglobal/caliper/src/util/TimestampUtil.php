<?php

namespace IMSGlobal\Caliper\util;

class TimestampUtil {
    /**
     * Given a DateTime object, return a string representation in ISO 8601 format, including milliseconds, in UTC.
     * @param DateTime $timestamp
     * @return string formatted timestamp
     */
    static function formatTimeISO8601MillisUTC($timestamp) {
        if ($timestamp == null) {
            return;
        }

        $timestampClone = clone $timestamp;
        $timestampClone->setTimezone(new \DateTimeZone('UTC'));

        // A string operation may be less expensive than mathematical ones
        $truncatedMilliseconds = substr($timestampClone->format('u'), 0, 3);

        return $timestampClone->format('Y-m-d\TH:i:s.') . $truncatedMilliseconds . 'Z';
    }
}