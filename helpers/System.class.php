<?php
/**
 * @package EndlessMonitor
 * @version 1.1.2
 * @author OsipXD 
 * @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
 * @link http://endlessworlds.ru/
 * @license GNU/GPLv2
 */

defined('_EMRUN') or die(' Direct access is denied! ');

class System
{
    /**
     * Get server status from db and prepare
     * for transmission to the template
     * 
     * @param   string  $serverId   Server ID in db
     * @return  mixed               Data for transmission to the template
     */
    public static function getInfo($serverId)
    {
        // Get config
        $config = new Config();

        // Connect to db
        $sql = new SQL();

        // Get server info
        $server = $sql->getServerInfo($serverId);
        $serverSettings = $config->get("servers.$serverId");

        // Prepare the data for transmission to the template
        $info['text'] = $serverSettings['text'];
        if ($server !== false && ($server['online'] > -1 && $server['max_online'] != 0)) {
            $info['percent'] = ($server['online'] >= $server['max_online']) ? 100 : $server['online'] / $server['max_online'] * 100;
            $info['status'] = ($config->get('style.status') == 1) ? $info['percent'] . '%' : $server['online'];
            if ($config->get('style.status') == 2) $info['status'] .= '/' . $server['max_online'];
            $info['style'] = 'online';
        } else {
            $info['percent'] = 100;
            $info['status'] = Lang::getLocaledString('OFFLINE');
            $info['style'] = 'offline';
        }

        return $info;
    }

    /**
     * Receiving information from the server 
     * and recorded in the database
     * 
     * @param   string  $serverId   Server ID in db
     */
    public static function serverRequest($serverId)
    {
        // Get config
        $config = new Config();

        // Get server config
        $server = $config->get("servers.$serverId");

        // Check params to valid
        if (count($server) < 3) die (Lang::getLocaledString('INVALID_PARAMS_ERROR'));

        // Create sql connection
        $sql = new SQL();

        // Get server status
        $res = MinecraftQurey::query($server['ip'], $server['port']);
            
        if ($res === false || $res['MaxPlayers'] == 0) {
            // Set server status to offline
            $sql->setOnline($serverId, 'online');
            return;
        }

        // Record status to db
        $sql->setOnline($serverId, 'online', $res['Players']);
        $sql->setOnline($serverId, 'max_online', $res['MaxPlayers']);
    }

    /**
     * Check the `serverId` for security
     * 
     * @param   string  $serverId   Server ID in db
     * @return  string              Checked ID
     */
    public static function secureId($serverId)
    {
        $config = new Config();
        
        // Get server list from config
        $serverList = $config->get('servers');
        
        // Safety checks `serverId`
        if ($serverList[$serverId] == null) die (Lang::getLocaledString('SERVER_NOT_FOUND_ERROR'));

        return $serverId;
    }
}
