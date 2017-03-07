<?php

namespace app\models;

use app\models\Model as Model;
use app\classes\Validator as Valdator;
use app\exceptions\SkillsNotFoundException as SkillsNotFoundException;
use app\exceptions\ValidatorException as ValidatorException;

/**
 * Description of Skill
 *
 * @author Vera
 */
class Skill extends Model
{
        /**
         *
         * @var string
         */
	public static $table = 'skills';
        
        /**
         *
         * @var array
         */
	public static $columns = array('name', 'persentage', 'status');
        
        /**
         *
         * @var string
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $id, $name, $persentage, $statu;
        
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
            $this->validator = new Valdator();
        }

        /**
         * 
         * @return array
         * @throws SkillsNotFoundException
         */
        public function GetSkillsVisible()
        {
            $fields = "name, persentage";
            $skills = $this->GetAll($fields, 'WHERE status = ' . SKILL_VISIBLE . ' ORDER BY persentage DESC');
            
            if(!$skills) {
                
                throw new SkillsNotFoundException('Nisu pronadjene informacije o posebnim znanjima i vestinama.');
            }
            
            return $skills;
        }
        
        /**
         * 
         * @return array
         * @throws SkillsNotFoundException
         */
        public function GetAllSkills() 
        {
            $skills = $this->GetAll('*', 'WHERE status = ' . SKILL_VISIBLE . ' OR status = ' . SKILL_NOT_VISIBLE . ' ORDER BY persentage DESC');

            if(!$skills) {
                
                throw new SkillsNotFoundException('Skills not found');
            }
            
            return $skills;
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
            return $this->SetStatus($id, SKILL_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusNotVisible($id)
        {
            return $this->SetStatus($id, SKILL_NOT_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusDeleted($id)
        {
            return $this->SetStatus($id, SKILL_DELETED);
        }
        
        /**
         * 
         * @throws ValidatorException
         */
        public function InsertSkill()
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_persentage']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }

            $this->name = $this->validator->Required($_POST['tb_name']);
            $this->persentage = $this->validator->Numeric($_POST['tb_persentage']);
            $this->status = isset($_POST['tb_status']) ? SKILL_VISIBLE : SKILL_NOT_VISIBLE;
            $this->Insert();
        }
        
        /**
         * 
         * @param int $id
         * @throws ValidatorException
         */
        public function UpdateSkill($id)
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_persentage']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }

            $item = $this->GetById($id);
            $item->name = $this->validator->Required($_POST['tb_name']);
            $item->persentage = $this->validator->Numeric($_POST['tb_persentage']);
            $item->status = isset($_POST['tb_status']) ? SKILL_VISIBLE : SKILL_NOT_VISIBLE;
            $item->Update();
        }
}
