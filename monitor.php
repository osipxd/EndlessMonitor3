<?php
/**
 * @package EndlessMonitor
 * @version 1.0
 * @author OsipXD 
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */

if (empty($_GET['server'])) {
    die(' Empty params! ');
}

define('_EMRUN', true);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

if (!file_exists('config.ini.php')) {
    include(ROOT . 'installation/index.php');
    die;
}

require_once(ROOT . 'helpers/include.php');
defined('_HINC') or die(' System files are missing! ');

$info = System::getInfo(System::secureId($_GET['server']));

/** @noinspection PhpIncludeInspection */
include(ROOT . 'tmpl/' . Config::get('system.template') . '.php');