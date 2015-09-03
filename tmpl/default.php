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
?>

<html>
    <head>
        <link rel="stylesheet" href="tmpl/css/default.css">
        <style type="text/css">
            .online span {
                background-color: <?php $tmploptions != '' ? $tmploptions : '#34c2e3' ?> ;
            }
        </style>
    </head>

    <div class="monitor <?php echo $info['style'] ?> stripes">
        <span style="width: <?php echo $info['percent'], '%'; ?>"></span>

        <div class="captions">
            <div class="left"><?php echo $info['text'] ?></div>
            <div class="right"><?php echo $info['status'] ?></div>
        </div>
    </div>
</html>