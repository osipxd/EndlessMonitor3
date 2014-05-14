<?php

/**
 * @package EndlessMonitor
 * @version 1.0
 * @author OsipXD 
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */
defined('_EMRUN') or die(' Direct access is denied! ');

class Lang {

    /**
     * Get localised string from index
     * 
     * @param   mixed   $index  String index in localisation file
     * @return  string          Localised string
     */
    public static function getLocaledString($index) {
        // Get localisation from config
        $locale = Config::get('system.locale');

        // Parse localisation file
        $file = parse_ini_file(ROOT . 'language' . DS . $locale . '.ini');

        return $file[$index];
    }

}
