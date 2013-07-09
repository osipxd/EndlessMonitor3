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

require_once(ROOT . 'helpers/Parts.class.php');
//defined('_IHINC') or die(' System files are missing! ');

if (!isset($_GET['s'])) $_GET['s'] = 'step1';

if ($_GET['s'] == 'step2') {
    CConfig::part1($_POST);
} else if ($_GET['s'] == 'step3') {
    CConfig::part2($_POST);

    $type = CConfig::getMonType();
} else if ($_GET['s'] == 'final') {
    CConfig::part3($_POST);
}

$page = (isset($_GET['s'])) ? $_GET['s'] . '.php' : 'step1.php';

/** @noinspection PhpIncludeInspection */
include(ROOT . 'view' . DS . 'index.php');