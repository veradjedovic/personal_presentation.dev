<?php 

namespace app\builders;

use app\models\Article as Article;
use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;

/**
 * Description of ArticleBuilder
 *
 * @author Vera
 */
class ArticleBuilder 
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
    public $article;
    
    
    /**
        * Construct
        */
    public function __construct() 
    {
        $this->db = Article::$table;
        $this->article = new Article();
    }
    
    /**
        * 
        * @return array
        */
    public function GetVisibleArticle($id)
    {      
        $fields = $this->db . ".title, " . $this->db . ".content, " . $this->db . ".image, " . $this->db . ".updated_at, user_profiles.name as author_name, user_profiles.surname as author_surname";        
        
        $q = " LEFT JOIN user_profiles
              ON " . $this->db . ".author_id = user_profiles.id
              WHERE " . $this->db . ".status = " . ARTICLE_VISIBLE . "
              AND " . $this->db . ".page_id = {$id}
              ORDER BY " . $this->db . ".updated_at DESC 
              LIMIT 0 , 10";
 
        $articles = $this->article->GetAll($fields, $q);
        
        if(!$articles) {

                throw new ArticleNotFoundException('Nije pronadjen ni jedan clanak.');
            }
        
        return $articles;
    }
}
