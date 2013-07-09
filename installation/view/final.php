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
 
?>
<section id="main" class="g-row">
    <div class="g-6 with-bg">
        <form id="server_form" action="index.php?s=final" method="POST">
            <fieldset>
                <legend>Поздравляем</legend>
                <hr>
                <div class="f-row">
                    <label for="server">ID сервера:</label>
                    <div class="f-input">
                        <input id="server" type="text" class="g-3" required> 
                        <p class="f-input-help g-3">Уникальный идентификатор сервера</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="text">Надпись:</label>
                    <div class="f-input">
                        <input id="text" type="text" class="g-3" required> 
                        <p class="f-input-help g-3">Чаще всего используют название сервера</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="ip">IP адрес сервера:</label>
                    <div class="f-input">
                        <input id="ip" type="text" class="g-3" <?php echo ($type == 'cron') ? 'required' : 'disabled' ;  ?>> 
                        <p class="f-input-help g-3">IP для подключения к черверу</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="port">Порт сервера:</label>
                    <div class="f-input">
                        <input id="port" type="text" class="g-3" <?php echo ($type == 'cron') ? 'required' : 'disabled' ;  ?>> 
                        <p class="f-input-help g-3">Порт для подключения к серверу</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-actions">
                    <p class="f-buttons">
                        <a class="f-bu f-bu-default" href="index.php?s=step2">Назад</a>
                        <button type="submit" class="f-bu f-bu-success">Далее</button>
                    </p>
                </div><!-- f-actions -->
            </fieldset>
        </form>
    </div>
</section>