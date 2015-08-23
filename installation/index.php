<?php
/**
 * @package       EndlessMonitor
 * @version       1.0.1
 * @author        OsipXD
 * @copyright (c) 2015, Osip Fatkullin. All Rights Reserved.
 * @link          http://endlesscode.ru/
 * @license       GNU/GPLv2
 */

define('_EMINS', true);
define('DS', DIRECTORY_SEPARATOR);
define('INSTALL', dirname(__FILE__) . DS);
define('ROOT', INSTALL . '..' . DS);

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(INSTALL . 'helpers/include.php');
defined('_IHINC') or die(' System files are missing! ');

if (!isset($_GET['s'])) $_GET['s'] = 'step1';

$page = $_GET['s'] . '.php';


if ($_GET['s'] == 'step2') {
    if (isset($_GET['er'])) {
        $error = true;
        Parts::delPart2();
    } else Parts::part1($_POST);
} else if ($_GET['s'] == 'step3') {
    Parts::part2($_POST);
    PrepareSQL::prepare('table');
    $type = Parts::getMonType();
} else if ($_GET['s'] == 'final') {
    Parts::part3($_POST);
    PrepareSQL::prepare('server', $_POST['server']);
    $type = Parts::getMonType();
    $serverId = $_POST['server'];
    Parts::delMonType();
    Parts::save();
}

/** @noinspection PhpIncludeInspection */
include(INSTALL . 'view' . DS . 'index.php');