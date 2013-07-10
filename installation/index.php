<?php
/**
 * @package EndlessMonitor
 * @version 1.0
 * @author OsipXD
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */

define('_EMINS', true);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

require_once(ROOT . 'helpers/include.php');
defined('_IHINC') or die(' System files are missing! ');

if (!isset($_GET['s'])) $_GET['s'] = 'step1';

$page = $_GET['s'] . '.php';

if ($_GET['s'] == 'step2') {
    Parts::part1($_POST);
    $error = (isset($_POST['er'])) ? true : false;
} else if ($_GET['s'] == 'step3') {
    Parts::part2($_POST);
    $type = Parts::getMonType();
} else if ($_GET['s'] == 'final') {
    Parts::part3($_POST);
}

/** @noinspection PhpIncludeInspection */
include(ROOT . 'view' . DS . 'index.php');