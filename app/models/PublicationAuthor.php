<?php

namespace app\models;

use app\factories\LoadObjectFactory as Factory;
use app\exceptions\PublicationAuthorsNotFoundException as PublicationAuthorsNotFoundException;

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
         * @param int $id
         * @return array
         * @throws PublicationAuthorsNotFoundException
         */
        public function GetAllVisibleAuthors($id)
        {
            $authors = $this->GetAll('*', 'WHERE publication_id = ' . $id . ' AND status = ' . PUBL_AUTHOR_VISIBLE);
             
            if(!$authors) {
                
                throw new PublicationAuthorsNotFoundException('Authors not found');
            }
            
            return $authors;
        }

        
        /**
         * 
         * @param string $name
         * @param string $surname
         * @param int $id
         * @return int
         */
        public function InsertPublicationAuthor($name='', $surname='', $id='')
        {
            $this->author_name = $this->validator->Required($name);
            $this->author_surname = $this->validator->Required($surname);
            $this->publication_id = $this->validator->Numeric($id);
            $this->status = PUBL_AUTHOR_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $author_id = $this->Insert();
            
            return $author_id;
        }

}
