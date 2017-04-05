<?php

namespace app\models;

use app\exceptions\ValidatorException as ValidatorException;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ProfileNotFoundException as ProfileNotFoundException;

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
	public static $columns = array('name', 'surname', 'address', 'city', 'user_id', 'country_id', 'profess_headline', 'industry_id', 'image', 'created_at', 'updated_at');
        
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
         *
         * @var object
         */
        protected $file_upload;

        /**
         *
         * @var string
         */
        protected $file_path = 'resources/images/img_profile';


        /**
         * Construct
         */
        public function __construct() 
        {
            $this->validator = Factory::GetObject('app\classes\Validator');
            $this->file_upload = Factory::GetObject('app\jobs\FileUploadJob');
        }

        /**
         *
         * @var type 
         */
        public $id, $name, $surname, $address, $city, $user_id, $country_id, $profess_headline, $industry_id, $image, $created_at, $updated_at;
        
        /**
         * 
         * @param int $id
         * @return object
         * @throws ProfileNotFoundException
         */
        public function GetUserProfile($id) 
        {
            $item = $this->GetAll('*', 'WHERE user_id =' . $id . ' limit 1')[0];
            
            if(!$item) {
                
                throw new ProfileNotFoundException('Profile not found');
            }
            
            return $item;
        }
        
        /**
         * 
         * @return object
         * @throws ProfileNotFoundException
         */
        public function GetFirstProfile() 
        {
            $fields = static::$table . ".name, " . static::$table . ".surname, " . static::$table . ".address, " . static::$table . ".city, countries.country as country, countries.country_code as country_code, " . static::$table . ".profess_headline, industry.name as industry, " . static::$table . ".image";

            $q = " LEFT JOIN countries ON " . static::$table . ".country_id = countries.id
                  LEFT JOIN industry ON " . static::$table . ".industry_id = industry.id  
                  LIMIT 1";
            
            
            $item = $this->GetAll($fields, $q)[0];
            
            if(!$item) {
                
                throw new ProfileNotFoundException('Profile not found');
            }
            
            return $item;
        }
        
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
        
        /**
         * 
         * @return string
         */
        protected function UploadProfilePicture()
        {
            $file = $this->file_upload->UploadPicture($this->file_path);
            
            return $file;
        }
        
        /**
         * 
         * @param int $id
         */
        public function UpdateProfilePicture($id) 
        {
            $profile = $this->GetById($this->validator->Numeric($id));
            $profile->image = $this->validator->TestInput($this->UploadProfilePicture());
            $profile->Update();
        }
}
