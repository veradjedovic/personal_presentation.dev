<?php

namespace app\models;

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
                  GROUP BY " . static::$table . ".name
                  ORDER BY " . static::$table . ".project_year DESC";

            $projects = $this->GetAll($fields, $q);

            if(!$projects) {

                throw new ProjectsNotFoundException('Nije pronadjen ni jedan projekat.');
            }

            return $projects;
        }
}
