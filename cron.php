<?php
/**
* @package EndlessMonitor
* @version 1.0
* @author OsipXD 
* @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
* @link http://endlessworlds.ru/
* @license GNU/GPLv2
*/

if (empty($_GET['server']) && empty($argv[1])) die(' Empty params! ');

define('_EMRUN', true);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

require_once(ROOT . 'helpers/include.php');
defined('_HINC') or die(' System files are missing! ');

System::serverRequest(System::secureId(empty($_GET['server']) ? $argv[1] : $_GET['server']));