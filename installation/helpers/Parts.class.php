<?php
/**
 * @package EndlessMonitor
 * @version 1.2
 * @author OsipXD
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */

defined('_EMINS') or die(' Direct access is denied! ');

class Parts
{   
    private static $path = 'config.ini.php~';
    
    public static function part1($data) {
        $part = array(
            $data['type'],
            '; Не надо пытаться смотреть конфиг ^_^ <?php die; ?> <- Не обращайте внимания на эту надпись ;)',
            '',
            '[system]',
            '; Системные настройки',
            '    locale = ' . $data['lang'],
            '    template = ' . $data['tmpl'],
            '',
            '[style]',
            '; Настройки отображения мониторинга',
            '    status = '.$data['view_type'].'                                       ; 1 - проценты (Н: 42%), 2 - дробь (Н: 36/100), 3 - только онлайн (Н: 53)',
            '',
        );
        
        self::write($part, 1);
    }
    
    public static function part2($data) {
        $part = array(
            '[mysql]',
            '; Настройки sql соединения',
            '    host = ' . $data['host'],
            '    port = ' . $data['port'],
            '    user = ' . $data['login'],
            '    pass = "' . $data['pass'] . '"                                        ; Пароль лучше заключить в кавычки',
            '    db = ' . $data['db'],
            '    table = ' . $data['table'] . '                           ; Таблица в которой хранится онлайн сервера(ов)',
            '',
        );
        
        self::write($part, 2);
    }
    
    public static function part3($data) {
        $part = array(
            '[servers]',
            '; Список мониторящихся серверов',
            '    ' . $data['server'] . ' = ' . $data['text'],
        );
        
        if (isset($data['ip']) && $data['ip'] != '') {
            $part[2] .= ', ' . $data['ip'] . ', ' . $data['port'];
        }
        
        self::write($part, 3); 
    }
    
    public static function delPart2() {
        $file = file(self::$path);
        
        for ($i = sizeof($file); $i > 11; $i--) {
            unset($file[$i]);
        }
        
        $fp = fopen(self::$path, "w");
        fputs($fp, implode("", $file));
        fclose($fp);
    }
    
    public static function getMonType() {
        $file = fopen(self::$path, 'r');       
        $result = fgets($file, 999);       
        fclose($file);  
        
        return $result;        
    }
    
    public static function delMonType() {
        $file = file(self::$path);
        unset($file[0]);
        
        $fp = fopen(self::$path, "w");
        fputs($fp, implode("", $file));
        fclose($fp);
    }
    
    public static function save() {
        copy($path, '../' . $path);
        unlink($path);
    }
    
    private static function write($strings, $partNum) {
                                                 
        if ($partNum == 1) $file = fopen(self::$path, 'w');
        else $file = fopen(self::$path, 'a');
        
        if ($partNum == 2 && count(file(self::$path)) > 19) return;
        if ($partNum == 3 && count(file(self::$path)) > 23) return;
        
        if ($file === false) die('Не удалось создать файл');
        
        foreach ($strings as $string) {
            fwrite($file, $string . "\r\n");
        }
        
        fclose($file);
    }
}