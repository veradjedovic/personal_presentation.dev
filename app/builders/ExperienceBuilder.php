<?php 

namespace app\builders;

use app\models\Experience as Experience;
use app\exceptions\ExperienceNotFoundException as ExperienceNotFoundException;

/**
 * Description of ExperienceBuilder
 *
 * @author Vera
 */
class ExperienceBuilder 
{   
    /**
        *
        * @var string 
        */
    public $db; 
    
    /**
        *
        * @var object
        */
    public $experience;
    
    
    /**
        * Construct
        */
    public function __construct() 
    {
        $this->db = Experience::$table;
        $this->experience = new Experience();
    }
    
    /**
        * 
        * @return string
        */
    public function GetVisibleExperience()
    {
        $fields = $this->db . ".title, " . $this->db . ".company, " . $this->db . ".city, " . $this->db . ".month_from, " . $this->db . ".month_to, " . $this->db . ".year_from, " . $this->db . ".year_to, " . $this->db . ".description, countries.country";        
        
        $q = " LEFT JOIN countries
              ON " . $this->db . ".country_id = countries.id
              WHERE experience.status = " . EXPERIENCE_VISIBLE . "
              ORDER BY year_from DESC";
 
        $experience = $this->experience->GetAll($fields, $q);
        
        if(!$experience) {

                throw new ExperienceNotFoundException('Informacije o radnom iskustvu nisu pronadjene.');
            }
        
        return $experience;
    }
}
