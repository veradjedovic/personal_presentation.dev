<?php

namespace app\models;

use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;

/**
 * Description of Experience
 *
 * @author Vera
 */
class Experience extends Model
{
        /**
         *
         * @var type 
         */
	public static $table = 'experience';
        
        /**
         *
         * @var type 
         */
	public static $columns = array('title', 'company', 'city', 'country_id', 'month_from', 'month_to', 'year_from', 'year_to', 'description', 'status', 'created_at', 'updated_at');
        
        /**
         *
         * @var type 
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $id, $title, $company, $city, $country_id, $month_from, $month_to, $year_from, $year_to, $description, $status, $created_at, $updated_at;

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
         */
        public function GetAllExperience() 
        {
            $fields = static::$table. ".id, " .static::$table. ".title, " . static::$table . ".company, " . static::$table . ".city, " . static::$table . ".month_from, " . static::$table . ".month_to, " . static::$table . ".year_from, " . static::$table . ".year_to, " . static::$table . ".description, " . static::$table . ".status, countries.country_code, countries.country" ;
            $query = "LEFT JOIN countries ON " . static::$table . ".country_id = countries.id
                    WHERE " . static::$table . ".status = " . EXPERIENCE_VISIBLE . "
                    OR " . static::$table . ".status = " . EXPERIENCE_NOT_VISIBLE . "
                    ORDER BY " . static::$table . ".year_from DESC";
            
            $experience = $this->GetAll($fields, $query);

            return $experience;
        }
        
        /**
         * 
         * @param int $id
         * @param int $status
         * @return object
         */
        protected function SetStatus($id, $status)
        {
        $item = $this->GetById($this->validator->Numeric($id));     
        $item->status = $status;
        $item->Update();

        return $item;
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusVisible($id)
        {
            return $this->SetStatus($id, EXPERIENCE_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusNotVisible($id)
        {
            return $this->SetStatus($id, EXPERIENCE_NOT_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusDeleted($id)
        {
            return $this->SetStatus($id, EXPERIENCE_DELETED);
        }
        
        /**
         * 
         * @throws ValidatorException
         */
        public function InsertExperience()
        {
            if(!isset($_POST['tb_title']) && !isset($_POST['tb_company']) && !isset($_POST['tb_city']) && !isset($_POST['tb_country']) && !isset($_POST['ta_description']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }

            $this->title = $this->validator->Required($_POST['tb_title']);
            $this->company = $this->validator->Required($_POST['tb_company']);
            $this->city = $this->validator->TestInput($_POST['tb_city']);
            $this->country_id = $this->validator->Required($_POST['tb_country']);
            $this->description = $this->validator->TestInput($_POST['ta_description']);
            $this->year_from = $this->validator->Required(isset($_POST['tb_year_from']) ? $_POST['tb_year_from'] : date('Y'));
            $this->year_to = $this->validator->TestInput(isset($_POST['tb_year_to']) ? $_POST['tb_year_to'] : '');
            $this->month_from = $this->validator->Required(isset($_POST['tb_month_from']) ? $_POST['tb_month_from'] : 'January');
            $this->month_to = $this->validator->TestInput(isset($_POST['tb_month_to']) ? $_POST['tb_month_to'] : '');
            $this->status = isset($_POST['tb_status']) ? EXPERIENCE_VISIBLE : EXPERIENCE_NOT_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->Insert();
        }
        
        /**
         * 
         * @param int $id
         * @throws ValidatorException
         */
        public function UpdateExperience($id)
        {
            if(!isset($_POST['tb_title']) && !isset($_POST['tb_company']) && !isset($_POST['tb_city']) && !isset($_POST['tb_country']) && !isset($_POST['ta_description']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }
   
            $item = $this->GetById($id);
            $item->title = $this->validator->Required($_POST['tb_title']);
            $item->company = $this->validator->Required($_POST['tb_company']);
            $item->city = $this->validator->TestInput($_POST['tb_city']);
            $item->country_id = $this->validator->Required($_POST['tb_country']);
            $item->description = $this->validator->TestInput($_POST['ta_description']);
            $item->year_from = $this->validator->Required(isset($_POST['tb_year_from']) ? $_POST['tb_year_from'] : date('Y'));
            $item->year_to = $this->validator->TestInput(isset($_POST['tb_year_to']) ? $_POST['tb_year_to'] : '');
            $item->month_from = $this->validator->Required(isset($_POST['tb_month_from']) ? $_POST['tb_month_from'] : 'January');
            $item->month_to = $this->validator->TestInput(isset($_POST['tb_month_to']) ? $_POST['tb_month_to'] : '');
            $item->status = isset($_POST['tb_status']) ? EXPERIENCE_VISIBLE : EXPERIENCE_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->Update();
        }
}
