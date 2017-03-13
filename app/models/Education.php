<?php

namespace app\models;

use app\exceptions\EducationNotFoundException;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ValidatorException as ValidatorException;
use app\traits\SetStatusTrait as SetStatusTrait;

/**
 * Description of Education
 *
 * @author Vera
 */
class Education extends Model
{
    use SetStatusTrait;
    
        /**
         *
         * @var string
         */
	public static $table = 'education';
        
        /**
         *
         * @var array
         */
	public static $columns = array('school', 'year_from', 'year_to', 'degree', 'field_of_study', 'description', 'status', 'created_at', 'updated_at');
        
        /**
         *
         * @var string
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $id, $school, $year_from, $year_to, $degree, $field_of_study, $description, $status, $created_at, $updated_at;
        
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
           $this->validator = Factory::GetObject('app\classes\Validator'); 
        }

        /**
         * 
         * @return array
         * @throws EducationNotFoundException
         */
        public function GetEducationVisible()
        {
            $education = $this->GetAll('*', 'WHERE status = ' . EDUCATION_VISIBLE . ' ORDER BY year_from DESC');
            
            if(!$education) {
                
                throw new EducationNotFoundException('Nije pronadjena ni jedna informacija vezana za obrazovanje.');
            }
            
            return $education;
        }
        
        /**
         * 
         * @throws ValidatorException
         */
        public function InsertEducation()
        {
            if(!isset($_POST['tb_school']) && !isset($_POST['tb_degree']) && !isset($_POST['tb_field_of_study']) && !isset($_POST['ta_description']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }

            $this->school = $this->validator->Required($_POST['tb_school']);
            $this->degree = $this->validator->Required($_POST['tb_degree']);
            $this->field_of_study = $this->validator->Required($_POST['tb_field_of_study']);
            $this->description = $this->validator->TestInput($_POST['ta_description']);
            $this->year_from = $this->validator->Required(isset($_POST['tb_year_from']) ? $_POST['tb_year_from'] : date('Y'));
            $this->year_to = $this->validator->Required(isset($_POST['tb_year_to']) ? $_POST['tb_year_to'] : date('Y'));
            $this->status = isset($_POST['tb_status']) ? EDUCATION_VISIBLE : EDUCATION_NOT_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->Insert();
        }
        
        /**
         * 
         * @param int $id
         * @throws ValidatorException
         */
        public function UpdateEducation($id)
        {
            if(!isset($_POST['tb_school']) && !isset($_POST['tb_degree']) && !isset($_POST['tb_field_of_study']) && !isset($_POST['ta_description']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }
   
            $item = $this->GetById($id);
            $item->school = $this->validator->Required($_POST['tb_school']);
            $item->degree = $this->validator->Required($_POST['tb_degree']);
            $item->field_of_study = $this->validator->Required($_POST['tb_field_of_study']);
            $item->description = $this->validator->TestInput($_POST['ta_description']);
            $item->year_from = $this->validator->Required(isset($_POST['tb_year_from']) ? $_POST['tb_year_from'] : date('Y'));
            $item->year_to = $this->validator->Required(isset($_POST['tb_year_to']) ? $_POST['tb_year_to'] : date('Y'));
            $item->status = isset($_POST['tb_status']) ? EDUCATION_VISIBLE : EDUCATION_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->Update();
        }
}
