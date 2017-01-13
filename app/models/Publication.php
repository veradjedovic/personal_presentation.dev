<?php

namespace app\models;

use app\models\Model as Model;

/**
 * Class Publication
 *
 * @author Vera
 */
class Publication extends Model
{
    /**
       *
       * @var string
       */
    public static $table = 'publications';
    
    /**
       *
       * @var array 
       */
    public static $columns = array('title', 'publisher', 'publ_month', 'publ_year', 'description', 'publ_url', 'document_name', 'status', 'created_at', 'updated_at');
    
    /**
       *
       * @var string  
       */
    public static $id_column = 'id';
    
    /**
       *
       * @var type 
       */
    public $id, $title, $publisher, $publ_month, $publ_year, $description, $publ_url, $document_name, $status, $created_at, $updated_at;
}
