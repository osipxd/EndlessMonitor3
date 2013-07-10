<?php
/**
 * @package EndlessMonitor
 * @version 1.1
 * @author OsipXD 
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */

defined('_EMRUN') or die(' Direct access is denied! ');

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
        // Get settings from config for MySQL connection
        $opt = Config::get('mysql');
        $this->table = $opt['table'];

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
     * @param   string  $server Server name on db
     * @return  bool|mixed      Server online and server max online
     */
    public function getServerInfo($server)
    {
        $query = "SELECT * 
                  FROM `$this->table`
                  WHERE server = '$server'";

        return $this->sendQuery($query);
    }

    /**
     * Set online value for server
     * 
     * @param   string  $server     Server name in db
     * @param   string  $type       Online or max online
     * @param   int     $value      Online value
     */
    public function setOnline($server, $type, $value = -1)
    {
        $query = "UPDATE `$this->table`
				  SET $type = $value
				  WHERE server = '$server'";

		$this->sendQuery($query);
	}

    /**
     * Send MySQLi query and get result
     * 
     * @param   string  $query  Query
     * @return  bool|mixed      Result of MySQLi query
     */
    public function sendQuery($query)
    {
        $res = $this->sql->query($query);

        if (is_bool($res)) return $res;
        return $res->fetch_assoc();
    }
}
