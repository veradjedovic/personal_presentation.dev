<?php

namespace app\models;

/**
 * Description of User
 *
 * @author Vera
 */
class User extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'users';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('email', 'password', 'token');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $email, $password, $token;

}
