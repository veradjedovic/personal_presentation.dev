<?php

namespace app\models;

/**
 * Description of ProjectMember
 *
 * @author Vera
 */
class ProjectMember extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'project_members';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('author_name', 'author_surname', 'project_id', 'status', 'created_at', 'updated_at');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $author_name, $author_surname, $project_id, $status, $created_at, $updated_at;

}
