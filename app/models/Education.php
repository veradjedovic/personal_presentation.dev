<?php

namespace app\models;

use app\exceptions\EducationNotFoundException;

/**
 * Description of Education
 *
 * @author Vera
 */
class Education extends Model
{
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
                * @return array
                * @throws EducationNotFoundException
                */
        public function GetEducationVisible()
        {
            $education = $this->GetAll('*', 'WHERE status = ' . EDUCATION_VISIBLE . ' ORDER BY year_from DESC');
//            $education = null;
            
            if(!$education) {
                
                throw new EducationNotFoundException('Nije pronadjena ni jedna informacija vezana za obrazovanje.');
            }
            
            return $education;
        }
}
