<?php

namespace app\models;

use app\models\Model as Model;

/**
 * Class Article
 *
 * @author Vera
 */
class Article extends Model
{
    /**
       *
       * @var string
       */
    public static $table = 'articles';
    
    /**
       *
       * @var array 
       */
    public static $columns = array('title', 'content', 'image', 'author_id', 'page_id', 'status', 'created_at', 'updated_at');
    
    /**
       *
       * @var string  
       */
    public static $id_column = 'id';
    
    /**
       *
       * @var type 
       */
    public $id, $title, $content, $image, $author_id, $page_id, $status, $created_at, $updated_at;
    
}
