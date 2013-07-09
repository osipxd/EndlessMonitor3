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

class SQL
{
    
    /**
     * MySQLi connection
     * 
     * @var mysqli
     */
    private $sql;

    /**
     * Table with server data
     * 
     * @var string
     */
    private $table;

    /**
     * Create MySQL connection
     */
    function __construct()
    {
        // Get config
        $config = new Config();
        
        // Get settings from config for MySQL connection
        $this->table = $config->get('mysql.table');
        $opt = array(
            'host' => $config->get('mysql.host'),
            'port' => $config->get('mysql.port'),
            'user' => $config->get('mysql.user'),
            'pass' => $config->get('mysql.pass'),
            'db'   => $config->get('mysql.db'),
        );

        // Connect to MySQL
        @$this->sql = new mysqli($opt['host'], $opt['user'], $opt['pass'], $opt['db'], $opt['port']);
        unset($opt);
        
        // Output error
        if ($this->sql->connect_error)
        {
            die(Lang::getLocaledString('CONNECT_ERROR') . ' (' . $this->sql->connect_errno . ') '
                . $this->sql->connect_error);
        }
    }

    /**
     * Get server information from db
     *
     * @internal param string $server - Server name on db
     * @return  bool|mixed|mysqli_result    - Server online and server max online
     */
    public function createTable()
    {
        $query = "SELECT * 
                  FROM `$this->table` 
                  WHERE server = '$server'";

        return $this->sendQuery($query);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Send MySQLi query and get result
     * 
     * @param   string  $query              - Query
     * @return  bool|mixed|mysqli_result    - Result of MySQLi query
     */
    private function sendQuery($query)
    {
        $res = $this->sql->query($query);

        if ($res === false) return $res;
        return $res->fetch_assoc();
    }
}