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

require_once(ROOT . 'helpers/include.php');
defined('_HINC') or die(' System files are missing! ');
$info = '';
$tmploptions = '';

if (!empty($_GET['to'])) {
    $tmploptions = $_GET['to'];
}

if (!empty($_GET['demo'])) {
    $info = System::getDemoInfo($_GET['server']);
    include(ROOT . 'tmpl/default.php');
    die;
}

if (!file_exists('config.ini.php')) {
    echo('Configuration doesn\'t exists.');
    die;
}
$info = System::getInfo(System::secureId($_GET['server']));

/** @noinspection PhpIncludeInspection */
include(ROOT . 'tmpl/' . Config::get('system.template') . '.php');
