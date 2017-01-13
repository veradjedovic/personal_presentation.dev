<?php

namespace app\models;

/**
 * Description of Industry
 *
 * @author Vera
 */
class Industry extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'industry';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('name');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $name;

}
