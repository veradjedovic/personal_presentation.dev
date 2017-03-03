<?php

namespace app\models;

use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;

/**
 * Description of Project
 *
 * @author Vera
 */
class Project extends Model
{
        /**
         *
         * @var string
         */
	public static $table = 'projects';
        
        /**
         *
         * @var array
         */
	public static $columns = array('name', 'project_month', 'project_year', 'project_url', 'description', 'status', 'created_at', 'updated_at');
        
        /**
         *
         * @var string
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $id, $name, $project_month, $project_year, $project_url, $description, $status, $created_at, $updated_at;
        
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
         * @return array
         * @throws ProjectsNotFoundException
         */
        public function GetAllProjects()
        {
            $fields = static::$table . ".id, " .static::$table . ".name, " . static::$table . ".project_month, " . static::$table . ".project_year, " . static::$table . ".project_url, " . static::$table . ".description, " . static::$table . ".status,
                  GROUP_CONCAT(project_members.author_name, ' ', project_members.author_surname 
                  SEPARATOR  ', ' ) as author";

            $q = "LEFT JOIN project_members ON " . static::$table . ".id = project_members.project_id
                  WHERE (" . static::$table . ".status = " . PROJECT_VISIBLE . " OR " . static::$table . ".status = " . PROJECT_NOT_VISIBLE . ") AND project_members.status = " . PROJECT_MEMBER_VISIBLE . "            
                  GROUP BY " . static::$table . ".id
                  ORDER BY " . static::$table . ".project_year DESC";

            $projects = $this->GetAll($fields, $q);

            if(!$projects) {

                throw new ProjectsNotFoundException('Projects not found.');
            }

            return $projects;
        }
        
        /**
         * 
         * @param int $id
         * @throws ValidatorException
         */
        public function UpdateProject($id)
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_url']) && !isset($_POST['ta_description']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data are not exist');
            }
   
            $item = $this->GetById($id);
            $item->name = $this->validator->Required($_POST['tb_name']);
            $item->project_url = !empty(trim($_POST['tb_url'])) ? $this->validator->Url($_POST['tb_url']) : '';
            $item->description = $this->validator->TestInput($_POST['ta_description']);
            $item->project_year = $this->validator->Required(isset($_POST['tb_year']) ? $_POST['tb_year'] : date('Y'));
            $item->project_month = $this->validator->Required(isset($_POST['tb_month']) ? $_POST['tb_month'] : 'January');
            $item->status = isset($_POST['tb_status']) ? PROJECT_VISIBLE : PROJECT_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->Update();
        }
        
        /**
         * 
         * @return int
         * @throws ValidatorException
         */
        public function InsertProject()
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_url']) && !isset($_POST['ta_description']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data are not exist');
            }

            $this->name = $this->validator->Required($_POST['tb_name']);
            $this->project_url = !empty(trim($_POST['tb_url']))? $this->validator->Url($_POST['tb_url']) : '';
            $this->description = $this->validator->TestInput($_POST['ta_description']);
            $this->project_year = $this->validator->Required(isset($_POST['tb_year']) ? $_POST['tb_year'] : date('Y'));
            $this->project_month = $this->validator->Required(isset($_POST['tb_month']) ? $_POST['tb_month'] : 'January');
            $this->status = isset($_POST['tb_status']) ? PROJECT_VISIBLE : PROJECT_NOT_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $project_id = $this->Insert();
            
            return $project_id;
        }
}
