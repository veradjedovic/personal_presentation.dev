<?php

namespace app\models;

use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;

/**
 * Description of Language
 *
 * @author Vera
 */
class Language extends Model
{
        /**
         *
         * @var string
         */
	public static $table = 'languages';
        
        /**
         *
         * @var type array
         */
	public static $columns = array('name', 'proficiency_id', 'status', 'created_at', 'updated_at');
        
        /**
         *
         * @var type string
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $id, $name, $proficiency_id, $status, $created_at, $updated_at;
        
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
         * @return object
         */
        public function GetAllLanguages() 
        {
            $fields = static::$table . '.id, ' . static::$table . '.name, ' . static::$table . '.status, language_proficiences.name as proficiency';
            $query = "LEFT JOIN language_proficiences ON " . static::$table . ".proficiency_id = language_proficiences.id
                    WHERE " . static::$table . ".status = " . LANG_VISIBLE . "
                    OR " . static::$table . ".status = " . LANG_NOT_VISIBLE . "";
            
            $languages = $this->GetAll($fields, $query);

            return $languages;
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
            return $this->SetStatus($id, LANG_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusNotVisible($id)
        {
            return $this->SetStatus($id, LANG_NOT_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusDeleted($id)
        {
            return $this->SetStatus($id, LANG_DELETED);
        }
        
        /**
         * 
         * @throws ValidatorException
         */
        public function InsertLanguage()
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_proficiency']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }

            $this->name = $this->validator->Required($_POST['tb_name']);
            $this->proficiency_id = $this->validator->Required($_POST['tb_proficiency']);
            $this->status = isset($_POST['tb_status']) ? LANG_VISIBLE : LANG_NOT_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->Insert();
        }
        
        /**
         * 
         * @param int $id
         * @throws ValidatorException
         */
        public function UpdateLanguage($id)
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_proficiency']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }

            $item = $this->GetById($id);
            $item->name = $this->validator->Required($_POST['tb_name']);
            $item->proficiency_id = $this->validator->Required($_POST['tb_proficiency']);
            $item->status = isset($_POST['tb_status']) ? LANG_VISIBLE : LANG_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->Update();
        }
}
