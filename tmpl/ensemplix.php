<?php
/**
 * @package EndlessMonitor
 * @version 1.0.1
 * @author OsipXD 
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */

defined('_EMRUN') or die(' Direct access is denied! ');

$info['icon'] = (isset($_GET['icon'])) ? $_GET['icon'] : 'pick';
$info['text'] = strtoupper($info['text']);

if ($info['style'] == 'offline') $info['text'] = '';
?>

<html>
    <head>
        <link rel="stylesheet" href="tmpl/css/ensemplix.css">
        <link rel="stylesheet" href="tmpl/fonts/myriadpro-regular.css">
    </head>

    <div class="monitor <?php echo $info['style'] ?> stripes">
        <span style="width: <?php echo $info['percent'], '%'; ?>"></span>
		<div class="icon <?php echo $info['icon']; ?>"></div>
        <div class="caption">
			<?php echo $info['text'], ' ', $info['status'] ?>
        </div>
    </div>
</html>