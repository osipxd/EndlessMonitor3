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
        <form id="sql_form" action="index.php?s=step3" method="POST">
            <fieldset>
                <legend>Конфигурация базы данных - Шаг 2 из 3</legend>
				<hr>
                <?php if ($error === true) { ?>
                <div class="f-row">
                    <div class="f-message f-message-error g-3">
                        <strong>Ошибка! </strong>
                         Неверно указаны данные для подключения к базе данных
                    </div><!--f-message -->
                </div>
                <?php } ?>
                <div class="f-row">
                    <label for="host">Сервер MySQL: <em>*</em></label>
                    <div class="f-input">
                        <input name="host" id="host" type="text" class="g-3" value="localhost" required> 
                        <p class="f-input-help">Обычно это <i>localhost</i></p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="port">MySQL порт: <em>*</em></label>
                    <div class="f-input">
                        <input name="port" id="port" type="text" class="g-1" value="3306" required>
                        <span class="f-input-comment">По умолчанию это <i>3306</i></span>
                        <p class="f-input-help g-3">Не меняйте, если сомневаетесь</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="login">Имя пользователя: <em>*</em></label>
                    <div class="f-input">
                        <input name="login" id="login" type="text" class="g-3" value="root" required> 
                        <p class="f-input-help g-3">Для установки на выделенную машину чаще всего используют <i>root</i></p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="pass">Пароль:  </label>
                    <div class="f-input">
                        <input name="pass" id="pass" type="password" class="g-3"> 
                        <p class="f-input-help g-3">Оставьте поле пустым для локальной установки</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="db">Имя базы данных: <em>*</em></label>
                    <div class="f-input">
                        <input name="db" id="db" type="text" class="g-3" required> 
                        <p class="f-input-help g-3">База данных должна существовать</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-row">
                    <label for="table">Имя таблицы: <em>*</em></label>
                    <div class="f-input">
                        <input name="table" id="table" type="text" class="g-3" value="endless_online" required> 
                        <p class="f-input-help g-3">Таблица в которой будет храниться значение онлайна серверов</p>
                    </div><!-- f-input -->
                </div><!-- f-row -->
                <div class="f-actions">
                    <p class="f-buttons">
                        <a class="f-bu f-bu-default" href="index.php?s=step1">Назад</a>
                        <button type="submit" class="f-bu f-bu-success">Далее</button>
                    </p>
                </div><!-- f-actions -->
            </fieldset>
        </form>
    </div>
</section>