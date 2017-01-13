<?php

namespace app\models;

/**
 * Description of UserProfile
 *
 * @author Vera
 */
class UserProfile extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'user_profiles';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('name', 'surname', 'address', 'city', 'country_id', 'profess_headline', 'industry_id', 'image', 'created_at', 'updated_at');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $name, $surname, $address, $city, $country_id, $profess_headline, $industry_id, $image, $created_at, $updated_at;

}
