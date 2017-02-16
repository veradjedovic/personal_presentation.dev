<?php

namespace app\models;

use app\exceptions\ValidatorException as ValidatorException;
use app\classes\Validator as Validator;
use app\exceptions\FileUploadException as FileUploadException;

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
        public $id, $name, $surname, $address, $city, $user_id, $country_id, $profess_headline, $industry_id, $image, $created_at, $updated_at;
        
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
         * @param int $id
         * @throws FileUploadException
         */
        public function UploadProfilePicture($id)
        {
            if(!isset($_FILES)) {
                
                throw new FileUploadException("File doesn't exists");   
            }
            
            if($_FILES==[]){
                
                $this->UpdateProfilePicture($id, '');
                
            } else {
                
                if($_FILES['f_upload']['size'] <= 0) {
                    
                    throw new FileUploadException('The picture is too large');                   
                }
                
                if(($_FILES['f_upload']['type'] != "image/jpeg") && ($_FILES['f_upload']['type'] != "image/jpg") && ($_FILES['f_upload']['type'] != "image/JPG") && ($_FILES['f_upload']['type'] != "image/png")) {
                    
                    throw new FileUploadException('Invalid file format');                   
                }
                
                if ($_FILES['f_upload']['error'] > 0) {
                    
                    throw new FileUploadException('Error is happend');
                }

                $avatar_img = uniqid() . $_FILES['f_upload']['name'];
                move_uploaded_file($_FILES['f_upload']['tmp_name'], APP_PATH. 'resources/images/img_profile/' . $avatar_img);
                
                $this->UpdateProfilePicture($id, $avatar_img);
            }
        }
        
        /**
         * 
         * @param int $id
         * @param string $param
         */
        protected function UpdateProfilePicture($id, $param) 
        {
            $profile = $this->GetById($this->validator->Numeric($id));
            $profile->image = $this->validator->TestInput($param);
            $profile->Update();
        }
}
