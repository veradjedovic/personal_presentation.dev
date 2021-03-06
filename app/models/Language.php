<?php

namespace app\models;

use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ValidatorException as ValidatorException;
use app\traits\SetStatusTrait as SetStatusTrait;

/**
 * Description of Language
 *
 * @author Vera
 */
class Language extends Model
{
    use SetStatusTrait;
    
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
            $this->validator = Factory::GetObject('app\classes\Validator');
        }

        /**
         * 
         * @return array
         * @throws LanguagesNotFoundException
         */
        public function GetVisibleLanguages()
        {
            $fields = static::$table . ".name, language_proficiences.name as prof_name";
            $q = " LEFT JOIN language_proficiences 
                ON " . static::$table . ".proficiency_id = language_proficiences.id
                WHERE " . static::$table . ".status = " . LANG_VISIBLE;

            $languages = $this->GetAll($fields, $q);

                if(!$languages) {

                    throw new LanguagesNotFoundException('Nije pronadjena ni jedna informacija o poznavanju jezika.');
                }

            return $languages;
        }
        
        /**
         * 
         * @return array
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
