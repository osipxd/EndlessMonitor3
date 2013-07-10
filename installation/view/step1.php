<?php 
/**
 * @package EndlessMonitor
 * @version 1.1
 * @author OsipXD 
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */
 
defined('_EMINS') or die(' Direct access is denied! ');
 
?>
<section id="main" class="g-row">
    <div class="g-row">
        <div class="g-6 with-bg">
            <form id="system_form" action="index.php?s=step2" method="POST">
                <fieldset>
                    <legend>Добро пожаловать! - Шаг 1 из 3</legend>
				    <p class=cent>Следуйте инструкциям инсталлятора и будет вам счастье.</p>
                    <hr>
                    <div class="f-row">
				        <label>Способ работы:</label>
                        <div class="f-input">
					        <label class="f-radio">
						        <input name="type" id="type" type="radio" value="plugin" checked="true"> Плагин
						    </label>
                            <label class="f-radio">
						        <input name="type" id="type" type="radio" value="cron"> Крон
                            </label>
					    </div>
                    </div><!-- f-row -->
                    <div class="f-row">
                        <label for="lang">Язык:</label>
                        <div class="f-input">
                            <input name="lang" id="lang" type="text" class="g-1" value="ru_RU" required>
                            <p class="f-input-help g-3">Файл локализации можно найти в папке <i>/languages/язык.ini</i></p>
                        </div><!-- f-input -->
                    </div><!-- f-row -->
				    <div class="f-row">
                        <label for="tmpl">Шаблон:</label>
                        <div class="f-input">
                            <input name="tmpl" id="tmpl" type="text" class="g-3" value="default" required>
                            <p class="f-input-help g-3">Шаблон нужно распаковать в папку <i>tmpl</i></p>
                        </div><!-- f-input -->
                    </div><!-- f-row -->
				    <div class="f-row">
				        <label for="view_type">Тип отображения:</label>
					    <div class="f-input">
					        <select name="view_type" id="view_type" class="g-3">
						        <option value="1">Проценты</option>
							    <option value="2">Онлайн/Максимум</option>
							    <option value="3">Только онлайн</option>
						    </select>
					    </div><!-- f-input -->
				    </div>
                    <div class="f-actions">
                        <p class="f-buttons">
                            <span class="f-bu disabled">Назад</span>
                            <button type="submit" class="f-bu f-bu-success">Далее</button>
                        </p>
                    </div><!-- f-actions -->
                </fieldset>
            </form>
        </div>
    </div>
</section>