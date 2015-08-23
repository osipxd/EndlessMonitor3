<?php

/**
 * @package       EndlessMonitor
 * @version       1.1
 * @author        OsipXD
 * @copyright (c) 2015, Osip Fatkullin. All Rights Reserved.
 * @link          http://endlesscode.ru/
 * @license       GNU/GPLv2
 */
defined('_EMRUN') or die(' Direct access is denied! ');

class Lang {

    /**
     * Get localised string from index
     *
     * @param   mixed $index String index in localisation file
     * @return  string          Localised string
     */
    public static function getLocaledString($index) {
        // Get localisation from config
        $locale = Config::get('system.locale');

        return Lang::getLocaledStringFromLocale($index, $locale);
    }

    /**
     * Get localised string from index and locale
     *
     * @param   mixed $index  String index in localisation file
     * @param  string $locale Locale
     * @return string Localised string
     */
    public static function getLocaledStringFromLocale($index, $locale) {
        // Parse localisation file
        $path = ROOT . 'language' . DS . $locale . '.ini';

        if (file_exists($path)) {
            $file = parse_ini_file($path);
        } else {
            die("[ERROR] Localisation $path file not found!");
        }

        return $file[$index];
    }

}
