<?php
/**
* @package EndlessMonitor
* @version 1.0.2
* @author OsipXD 
* @copyright (c) 2013, Osip Fatkullin. All Rights Reserved.
* @link http://endlessworlds.ru/
* @license GNU/GPLv2
*/

defined('_EMRUN') or die(' Direct access is denied! ');

class Config
{

    /**
     * Parsed config file
     * 
     * @var mixed
     */
    private $config;

    /**
     * Parse config file
     * 
     * @param   mixed   $file   - Path to config file (not required!)
     * @return  Config 
     */
    function __construct($file = 'config.ini.php')
    {
        $this->config = parse_ini_file(ROOT . $file, true);
    }

    /**
     * Get value from config
     * 
     * @param   string  $section    - Config section (separator - "." point)
     * @return  mixed               - Value from config
     */
    public function get($section)
    {
        // Prepare section
        $sections = $this->parse($section);    
        $result = $this->config;
        unset($section);

        // Get value from section
        foreach ($sections as $section) {
            $result = $result[$section];
        }
        
        // If getted value is server info 
        if ($sections[0] == 'servers' && count($sections) == 2) {
            $info = explode(', ', $result);
            unset($result);
            
            // Check valid server info
            if ($info[0] == null || $info[0] == '') die(Lang::getLocaledString('INVALID_PARAMS_ERROR')); 
            $result['text'] = $info[0];
            
            // Write ip and port to result if defined
            if (count($info) >= 3) {
                $result['ip'] = $info[1];
                $result['port'] = $info[2];
            }
        }

        return $result;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    /**
     * Splitting a string
     * 
     * @param   mixed   $str    - String to splitting
     * @return  array           - Divided string
     */
    private function parse($str)
    {
        $parts = explode('.', $str);

        return $parts;
    }

}
