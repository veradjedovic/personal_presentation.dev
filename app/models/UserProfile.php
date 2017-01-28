<?php

namespace app\models;

use app\exceptions\ValidatorException as ValidatorException;
use app\classes\Validator as Validator;

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
         * @var object
         */
        protected $validator;
        
        
        /**
         * Construct
         */
        public function __construct() 
        {
            $this->validator = new Validator();
        }

        /**
         *
         * @var type 
         */
        public $id, $name, $surname, $address, $city, $country_id, $profess_headline, $industry_id, $image, $created_at, $updated_at;
        
        /**
         * 
         * UpdateUser method
         * @throws ValidatorException
         */
        public function UpdateUser()
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_surname']) && !isset($_POST['tb_profess_headline']) && !isset($_POST['tb_address']) && !isset($_POST['tb_city']) && !isset($_POST['tb_country']) && !isset($_POST['tb_industry'])) {
            
                throw new ValidatorException('Profilni podaci ne postoje!');
            }         

            $profile = $this->GetById($this->validator->Numeric($_GET['id']));                 
            $profile->name = $this->validator->Required($_POST['tb_name']);
            $profile->surname = $this->validator->Required($_POST['tb_surname']);
            $profile->address = $this->validator->TestInput($_POST['tb_address']);
            $profile->city = $this->validator->TestInput($_POST['tb_city']);
            $profile->profess_headline = $this->validator->TestInput($_POST['tb_profess_headline']);
            $profile->country_id = $this->validator->Numeric($_POST['tb_country']);
            $profile->industry_id = $this->validator->Numeric($_POST['tb_industry']);
            $profile->Update(); 
        }

}
