<?php

namespace app\models;

/**
 * Description of Language
 *
 * @author Vera
 */
class Language extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'languages';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('name', 'proficiency_id', 'status', 'created_at', 'updated_at');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $name, $proficiency_id, $status, $created_at, $updated_at;
}
