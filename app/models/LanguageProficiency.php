<?php

namespace app\models;

/**
 * Description of LanguageProficiency
 *
 * @author Vera
 */
class LanguageProficiency extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'language_proficiences';
        
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
