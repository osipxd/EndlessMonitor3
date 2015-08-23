<?php
/**
 * @package       EndlessMonitor
 * @version       1.2
 * @author        OsipXD
 * @copyright (c) 2015, Osip Fatkullin. All Rights Reserved.
 * @link          http://endlesscode.ru/
 * @license       GNU/GPLv2
 */

defined('_EMRUN') or die(' Direct access is denied! ');

class Config {
    /**
     * Get value from config
     *
     * @param   string $section Config section. Separator - "." (point)
     * @return  mixed           Value from config
     */
    public static function get($section) {
        $file = file_exists('config.ini.php') ? 'config.ini.php' : 'config.ini.php~';
        if (!file_exists($file)) {
            die(Lang::getLocaledStringFromLocale('CONFIG_NOT_FOUND_ERROR', 'ru_RU'));
        }

        $config = parse_ini_file(ROOT . $file, true);

        // Prepare section
        $sections = self::parse($section);
        $result = $config;
        unset($section);

        // Get value from section
        foreach ($sections as $section) {
            $result = $result[$section];
        }

        // If getted value is server info 
        if ($sections[0] == 'servers' && count($sections) == 2) {
            $info = explode(', ', $result);
            unset($result);

            // Check valid server info
            if ($info[0] == null || $info[0] == '') {
                die(Lang::getLocaledString('INVALID_PARAMS_ERROR'));
            }
            $result['text'] = $info[0];

            // Write ip and port to result if defined
            if (count($info) >= 3) {
                $result['ip'] = $info[1];
                $result['port'] = $info[2];
            }
        }

        return $result;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Splitting a string
     *
     * @param   mixed $str String to splitting
     * @return  array           Divided string
     */
    private static function parse($str) {
        $parts = explode('.', $str);

        return $parts;
    }

}
