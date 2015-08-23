<?php

/**
 * @package       EndlessMonitor
 * @version       1.1.2
 * @author        OsipXD
 * @copyright (c) 2015, Osip Fatkullin. All Rights Reserved.
 * @link          http://endlesscode.ru/
 * @license       GNU/GPLv2
 */
defined('_EMRUN') or die(' Direct access is denied! ');

class SQL {

    /**
     * @var mysqli  MySQLi connection
     */
    private $sql;

    /**
     * @var string  Table with server data
     */
    private $table;

    /**
     * @var string Errors
     */
    private $err;

    /**
     * Create MySQL connection
     */
    function __construct() {
        // Get settings from config for MySQL connection
        $opt = Config::get('mysql');
        $this->table = $opt['table'];

        // Connect to MySQL
        @$this->sql = new mysqli($opt['host'], $opt['user'], $opt['pass'], $opt['db'], $opt['port']);
        unset($opt);

        // Output error
        if ($this->sql->connect_error) {
            $this->err = Lang::getLocaledString('CONNECT_ERROR') . ' (' . $this->sql->connect_errno . ') ' . $this->sql->connect_error;
        }
    }

    /**
     * Get server information from db
     *
     * @param   string $server Server name on db
     * @return  bool|mixed      Server online and server max online
     */
    public function getServerInfo($server) {
        $query = "SELECT * FROM `$this->table` WHERE server = '$server'";

        return $this->sendQuery($query);
    }

    /**
     * Send MySQLi query and get result
     *
     * @param   string $query Query
     * @return  bool|mixed      Result of MySQLi query
     */
    public function sendQuery($query) {
        $res = $this->sql->query($query);

        if (is_bool($res)) {
            return $res;
        }
        return $res->fetch_assoc();
    }

    /**
     * Set online value for server
     *
     * @param   string $server Server name in db
     * @param   string $type   Online or max online
     * @param   int    $value  Online value
     */
    public function setOnline($server, $type, $value = -1) {
        $query = "UPDATE `$this->table` SET $type = $value WHERE server = '$server'";

        $this->sendQuery($query);
    }

    /**
     * Check for errors
     *
     * @return  bool    Return true if there are errors
     */
    public function isError() {
        return isset($this->err);
    }

    /**
     * Get error
     *
     * @return  mixed   Getter for `$err`
     */
    public function getError() {
        return $this->err;
    }

}
