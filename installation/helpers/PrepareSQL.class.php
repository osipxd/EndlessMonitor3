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

class PrepareSQL
{
    /**
     * Create MySQL connection
     *
     * $param   string  $type   Type of request (table or server)
     */
    public static function prepare($type, $serverId = null)
    {
        global $error;
        
        $sql = new SQL();
        $table = Config::get('mysql.table');

        if ($sql->isError()) {
            header ('Location: index.php?s=step2&er=1');
            exit();
        }

        if ($type == 'table'){
            $query = "CREATE TABLE IF NOT EXISTS `$table` (
                          `server` varchar(20) DEFAULT NULL,
                          `online` int(3) NOT NULL DEFAULT '-1',
                          `max_online` int(3) NOT NULL DEFAULT '0'
                      );";
        } else if (isset($serverId)) {
            $query = "INSERT INTO `$table` (`server`, `online`, `max_online`)
                      VALUES ('$serverId', -1, 100);";
        } else return;

        $res = $sql->sendQuery($query);

        if ($res === false) {
            header ('Location: index.php?s=step2&er=1');
            exit();
        }
    }
}