<?php

namespace app\models;

use app\models\Model as Model;
use app\exceptions\SkillsNotFoundException as SkillsNotFoundException;


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
        public $id, $name, $persentage, $status;
        
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
}
