<?php

namespace app\models;

/**
 * Description of PublicationAuthor
 *
 * @author Vera
 */
class PublicationAuthor extends Model
{
        /**
              *
              * @var string 
              */
	public static $table = 'publication_authors';
        
        /**
              *
              * @var array 
              */
	public static $columns = array('author_name', 'author_surname', 'publication_id', 'status', 'created_at', 'updated_at');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $author_name, $author_surname, $publication_id, $status, $created_at, $updated_at;

}
