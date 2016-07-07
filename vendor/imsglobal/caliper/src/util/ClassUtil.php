<?php

namespace IMSGlobal\Caliper\util;

/**
 * Class ClassUtil
 *
 * Provide useful methods to overcome OOP shortcomings in some versions of PHP.
 */
class ClassUtil {
    /**
     * The "::class" notation isn't available until PHP 5.5.  This method is a workaround for
     * older versions of PHP.
     * @deprecated Remove PHP 5.4 requirements from caliper-php, then replace calls to this method with reference to "::class" instead.
     * @return string Name of this class
     */
    static public function className() {
        return get_called_class();
    }
}