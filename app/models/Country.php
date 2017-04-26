<?php

namespace app\models;

/**
 * Description of Country
 *
 * @author Vera
 */
class Country extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'countries';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('country_code', 'country', 'country_sr');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $country_code, $country;

}
