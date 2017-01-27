<?php 

namespace app\classes;

/**
 * Description of Database
 *
 * @author Vera
 */
class Session
{
        /**
         * 
         * @param string $kay
         * @param string $default
         * @return string
         */
	public static function GetKey($key, $default = null)
	{
		if(!isset($_SESSION)){

			session_start();
		}	
		if(!$_SESSION[$key]){

			return $default;

		} else {

			return $_SESSION[$key];
		}
	}

        /**
         * 
         * @param string $key
         * @param string $value
         */
	public static function SetKey($key, $value)
	{
		if(!isset($_SESSION)){

			session_start();
		}
		$_SESSION[$key] = $value;
	}
}
