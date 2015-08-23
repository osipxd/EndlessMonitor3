<?php
/**
 * @package       EndlessMonitor
 * @version       1.0
 * @author        OsipXD
 * @copyright (c) 2015, Osip Fatkullin. All Rights Reserved.
 * @link          http://endlesscode.ru/
 * @license       GNU/GPLv2
 */
defined('_EMINS') or die(' Direct access is denied! ');

$path = dirname(ROOT);
?>
<section id="main" class="g-row">
    <div class="g-6 with-bg">
        <h3>Поздравляю!</h3>
        <hr>
        <p>Вы успешно установили <i>Endless Monitor 3</i>.</p>
        <?php if ($type == "cron\r\n"): ?>
            <p>Задание в кроне буде иметь примерно такой вид:</p>
            <pre>*/5 * * * * php -f <?php echo $path, DS, 'cron.php ', $serverId; ?></pre>
        <?php else: ?>
            <p>При использовании плагина задание крону давать не нужно.</p>
        <?php endif; ?>
        <p>Использовать скрипт нужно через фреймы. Ссылка для вставки в фрейм имеет такой вид:</p>
        <pre>http://адрес_сайта.ru/путь_до_скрипта/monitor.php?server=id_сервера</pre>
        <p><strong>После установки обязятельно удалите папку <i>installation</i>!</strong></p>
    </div>
</section>