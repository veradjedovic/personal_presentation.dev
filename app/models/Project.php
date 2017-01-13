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
}
