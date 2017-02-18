<?php

namespace app\models;

use app\classes\Session as Session;
use app\models\UserProfile as UserProfile;
use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;

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
	public static $columns = array('email', 'password', 'token', 'status');
        
        /**
         *
         * @var string
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $id, $email, $password, $token, $status;
        
        /**
         *
         * @var object
         */
        protected $validator;
        
        /**
         *
         * @var object
         */
        protected $userProfile;


        /**
         * Construct
         */
        public function __construct() 
        {
            $this->validator = new Validator();
            $this->userProfile = new UserProfile();
        }
        
        /**
         * 
         * @throws ValidatorException
         */
        public function UpdateUser()
        {
            if(!isset($_POST['tb_email']) && !isset($_POST['tb_password']) && !isset($_POST['tb_confirm_password'])) {
            
                throw new ValidatorException('Podaci nisu dosli sa kontakt forme!');
            }
            
            $user = $this->GetById($this->validator->Numeric($_GET['id']));                      
            $user->email = $this->validator->Email($_POST['tb_email']);
            $user->password = md5($this->validator->Password($_POST['tb_password'], $_POST['tb_confirm_password']));
            $user->Update(); 
        }
        
        /**
         * SetSessions method
         */
        public function setSessions()
        {
            Session::set("status",$this->status);
            Session::set("id",$this->id);
            Session::set("token",$this->token);
            Session::set("name",$this->userProfile->GetUserProfile($this->id)->name);
            Session::set("surname",$this->userProfile->GetUserProfile($this->id)->surname);
            Session::set("image",$this->userProfile->GetUserProfile($this->id)->image);
        }

        /**
         * Logout method
         */
        public function logout()
        {
            Session::stop();
            header("location:" . SITE_ROOT . "/login/");
        }

        /**
         * 
         * @throws ValidatorException
         */
        public function userLogin() 
        {
           if(!isset($_POST['tb_email']) && !isset($_POST['tb_password'])){
            
                throw new ValidatorException("Credentials doesn't exists");
            }

            $email= $this->validator->Email($_POST['tb_email']);
            $password = md5($this->validator->Required($_POST['tb_password']));

            $admin = $this->login($email, $password);
            
            if(!$admin){
                   
                throw new ValidatorException('Invalid access!');
            } 

            header("location:" . SITE_ROOT . "/admin/");
        }
        
        /**
         * 
         * @param string $username
         * @param string $password
         * @return boolean
         */
        protected function login($email, $password)
        {
            $admins=$this->getAll("*", "WHERE email='{$email}' and password='{$password}' LIMIT 1");

            if(count($admins)==1){
                    $admins[0]->setSessions();
                    return $admins[0];
            } else {
                    return false;
            }
        }
}
