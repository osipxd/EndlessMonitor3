<?php
/**
 * @package       EndlessMonitor
 * @version       1.0
 * @author        OsipXD
 * @copyright (c) 2015, Osip Fatkullin. All Rights Reserved.
 * @link          http://endlesscode.ru/
 * @license       GNU/GPLv2
 */

defined('_EMRUN') or die(' Direct access is denied! ');

$helpersPath = dirname(__FILE__) . DS;

require_once($helpersPath . 'Config.class.php');
require_once($helpersPath . 'SQL.class.php');
require_once($helpersPath . 'Lang.class.php');
require_once($helpersPath . 'System.class.php');
require_once($helpersPath . 'MinecraftQuery.class.php');

unset($helpersPath);
define('_HINC', true);