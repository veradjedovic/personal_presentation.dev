<?php

namespace app\models;

/**
 * Description of Experience
 *
 * @author Vera
 */
class Experience extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'experience';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('title', 'company', 'city', 'country_id', 'month_from', 'month_to', 'year_from', 'year_to', 'description', 'status', 'created_at', 'updated_at');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $title, $company, $city, $country_id, $month_from, $month_to, $year_from, $year_to, $description, $status, $created_at, $updated_at;
}
