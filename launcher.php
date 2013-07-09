<?php
/**
 * Addon for EndlessMonitor. Online in your launcher!
 * 
 * @package EndlessMonitor
 * @version 1.0.1
 * @author OsipXD 
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */
 
if (empty($_POST['server'])) exit('0: Empty POST params!');

define('_EMRUN', true);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

require_once(ROOT . 'helpers/include.php');
defined('_HINC') or exit('1: System files are missing!');

$info = System::getInfo(System::secureId($_POST['server']));

if ($info['style'] == 'offline') exit('2: Server is offline!');

exit('3: ' . $info['status']);