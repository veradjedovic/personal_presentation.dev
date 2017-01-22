<?php 

namespace app\builders;

use app\models\Project as Project;
use app\exceptions\ProjectsNotFoundException as ProjectsNotFoundException;

/**
 * Description of ProjectBuilder
 *
 * @author Vera
 */
class ProjectBuilder 
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
    protected $project;


    /**
        * Construct
        */
    public function __construct() 
    {
        $this->db = Project::$table;
        $this->project = new Project();
    }
    
    /**
        * 
        * @return string
        */
    public function GetVisibleProjects()
    {
        $fields = $this->db . ".name, " . $this->db . ".project_month, " . $this->db . ".project_year, " . $this->db . ".project_url, " . $this->db . ".description,
              GROUP_CONCAT(project_members.author_name, ' ', project_members.author_surname 
              SEPARATOR  ', ' ) as author";
        
        $q = "LEFT JOIN project_members ON " . $this->db . ".id = project_members.project_id
              WHERE " . $this->db . ".status = " . PROJECT_VISIBLE . " AND project_members.status = " . PROJECT_MEMBER_VISIBLE . "            
              GROUP BY " . $this->db . ".name
              ORDER BY " . $this->db . ".project_year DESC";
        
        $projects = $this->project->GetAll($fields, $q);

        if(!$projects) {
            
            throw new ProjectsNotFoundException('Nije pronadjen ni jedan projekat.');
        }

        return $projects;
    }
}
