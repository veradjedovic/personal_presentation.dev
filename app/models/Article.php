<?php

namespace app\models;

use app\models\Model as Model;
use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;

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
    
    /**
     * 
     * @return array
     * @throws ArticleNotFoundException
     */
    public function GetAllArticles() 
    {
        $fields = static::$table . '.title, ' 
                . static::$table . '.content, ' 
                . static::$table . '.image, '
                . static::$table . '.status, '
                . static::$table . '.updated_at, 
                 pages.name as page,
                 user_profiles.name as author_name, 
                 user_profiles.surname as author_surname';   
        
        $query = "LEFT JOIN users ON " . static::$table . ".author_id = users.id
                 LEFT JOIN user_profiles ON users.id = user_profiles.id
                 LEFT JOIN pages ON " . static::$table . ".page_id = pages.id
                 WHERE " . static::$table . ".status = " . ARTICLE_VISIBLE . "
                 OR " . static::$table . ".status = " . ARTICLE_NOT_VISIBLE . " ORDER BY " . static::$table . ".updated_at DESC";
        
        $articles = $this->GetAll($fields, $query);  
        
        if(!$articles) {
            
            throw new ArticleNotFoundException('Articles not found');
        }
            
        return $articles;
    }
    
}
