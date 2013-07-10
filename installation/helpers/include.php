<?php
/**
 * @package EndlessMonitor
 * @version 1.0
 * @author OsipXD
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */

defined('_EMINS') or die(' Direct access is denied! ');

$helpersPath = dirname(__FILE__) . DS;
require_once($helpersPath . 'Parts.class.php');
require_once($helpersPath . 'PrepareSQL.class.php');

$helpersPath = ROOT . '../helpers/';
require_once($helpersPath . 'Config.class.php');
require_once($helpersPath . 'SQL.class.php');
require_once($helpersPath . 'Lang.class.php');

unset($helpersPath);
define('_IHINC', true);