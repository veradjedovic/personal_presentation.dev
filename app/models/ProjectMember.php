<?php

namespace app\models;

use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;

/**
 * Description of ProjectMember
 *
 * @author Vera
 */
class ProjectMember extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'project_members';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('author_name', 'author_surname', 'project_id', 'status', 'created_at', 'updated_at');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $author_name, $author_surname, $project_id, $status, $created_at, $updated_at;
        
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
         * @param string $name
         * @param string $surname
         * @param int $id
         * @throws ValidatorException
         */
        public function InsertProjectMember($name='', $surname='', $id='') 
        {
            $this->author_name = $this->validator->Required($name);
            $this->author_surname = $this->validator->TestInput($surname);
            $this->project_id = $this->validator->Numeric($id);
            $this->status = PROJECT_MEMBER_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->Insert();
        }

}
