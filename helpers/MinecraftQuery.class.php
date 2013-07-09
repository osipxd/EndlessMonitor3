<?php
/*
 * Queries Minecraft server
 * Returns array on success, false on failure.
 *
 * Written by xPaw
 *
 * Website: http://xpaw.ru
 * GitHub: https://github.com/xPaw/PHP-Minecraft-Query
 */
 
class MinecraftQurey
{
    public static function query( $ip, $port = 25565, $timeout = 2 )
    {   
        if (!function_exists('socket_create')) die(Lang::getLocaledString('SOCKET_SUPPORT_ERROR'));
       
        $socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );

        socket_set_option( $socket, SOL_SOCKET, SO_SNDTIMEO, array( 'sec' => (int)$timeout, 'usec' => 0 ) );
        socket_set_option( $socket, SOL_SOCKET, SO_RCVTIMEO, array( 'sec' => (int)$timeout, 'usec' => 0 ) );

        if( $socket === FALSE || @socket_connect( $socket, $ip, (int)$port ) === FALSE )
        {
            return FALSE;
        }

        socket_send( $socket, "\xFE\x01", 2, 0 );
        $len = socket_recv( $socket, $data, 512, 0 );
        socket_close( $socket );

        if( $len < 4 || $data[ 0 ] !== "\xFF" )
        {
            return FALSE;
        }

        $data = substr( $data, 3 ); // Strip packet header (kick message packet and short length)
        $data = iconv( 'UTF-16BE', 'UTF-8', $data );

        // Are we dealing with Minecraft 1.4+ server?
        if( $data[ 1 ] === "\xA7" && $data[ 2 ] === "\x31" )
        {
            $data = explode( "\x00", $data );

            return Array(
                'HostName'   => $data[ 3 ],
                'Players'    => intval( $data[ 4 ] ),
                'MaxPlayers' => intval( $data[ 5 ] ),
                'Protocol'   => intval( $data[ 1 ] ),
                'Version'    => $data[ 2 ]
            );
        }

        $data = explode( "\xA7", $data );

        return Array(
            'HostName'   => substr( $data[ 0 ], 0, -1 ),
            'Players'    => isset( $data[ 1 ] ) ? intval( $data[ 1 ] ) : 0,
            'MaxPlayers' => isset( $data[ 2 ] ) ? intval( $data[ 2 ] ) : 0,
            'Protocol'   => 0,
            'Version'    => '1.3'
        );
    }
}