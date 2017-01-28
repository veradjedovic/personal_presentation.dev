<?php

namespace app\models;

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
	public static $columns = array('email', 'password', 'token');
        
        /**
         *
         * @var string
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $id, $email, $password, $token;
        
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
}
