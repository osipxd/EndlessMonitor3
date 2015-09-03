<?php

/**
 * @package       EndlessMonitor
 * @version       1.0
 * @author        OsipXD
 * @copyright (c) 2015, Osip Fatkullin. All Rights Reserved.
 * @link          http://endlesscode.ru/
 * @license       GNU/GPLv2
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
$info = '';
$tmploptions = '';
if ($_GET['demo'] == 'true') {
    $info = System::getDemoInfo(System::secureId($_GET['server']));
} else {
    $info = System::getInfo(System::secureId($_GET['server']));
}

if ($_GET['to'] != null ) {
    $tmploptions = $_GET['to'];
}

/** @noinspection PhpIncludeInspection */
include(ROOT . 'tmpl/' . Config::get('system.template') . '.php');
