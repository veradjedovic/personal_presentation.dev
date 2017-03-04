<?php

namespace app\models;

use app\models\Model as Model;
use app\classes\Validator as Validator;
use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use app\exceptions\FileUploadException as FileUploadException;
use app\exceptions\ValidatorException as ValidatorException;

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
     * @var object
     */
    protected $validator;
    
    
    /**
     * Construct
     */
    public function __construct()
    {
        $this->validator = new Validator();
    }
    
    /**
     * 
     * @return array
     * @throws ArticleNotFoundException
     */
    public function GetAllArticles() 
    {
        $fields = static::$table . '.id, ' 
                . static::$table . '.title, ' 
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
    
    /**
     * 
     * @throws ValidatorException
     */
    public function InsertArticle($id) 
    {
        if(!isset($_POST['tb_title']) && !isset($_POST['tb_page']) && !isset($_POST['ta_content'])) {
            
                throw new ValidatorException('Profilni podaci ne postoje!');
            }       
   
            $this->title = $this->validator->Required($_POST['tb_title']);
            $this->author_id = $this->validator->Numeric($id);
            $this->page_id = $this->validator->Required($_POST['tb_page']);
            $this->content = $this->validator->Required($_POST['ta_content']);           
            $this->status = isset($_POST['tb_status']) ? ARTICLE_VISIBLE : ARTICLE_NOT_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');       
            $this->image = $this->validator->TestInput($this->UploadArticlePicture());
            $this->Insert(); 
    }
    
    /**
     * 
     * @param int $id
     * @throws ValidatorException
     */
    public function UpdateArticle($id) 
    {
        if(!isset($_POST['tb_title']) && !isset($_POST['tb_page']) && !isset($_POST['ta_content'])) {
            
                throw new ValidatorException('Profilni podaci ne postoje!');
            }         

            $item = $this->GetById($this->validator->Numeric($id));                 
            $item->title = $this->validator->Required($_POST['tb_title']);
            $item->page_id = $this->validator->Required($_POST['tb_page']);
            $item->content = $this->validator->Required($_POST['ta_content']);
            $item->status = isset($_POST['tb_status']) ? ARTICLE_VISIBLE : ARTICLE_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->Update(); 
    }
    
    /**
     * 
     * @return string
     * @throws FileUploadException
     */
    protected function UploadArticlePicture()
    {
            if(!isset($_FILES)) {
                
                throw new FileUploadException("File doesn't exists");   
            }
            
            if($_FILES==[] || ($_FILES['f_upload']['size'] == false && $_FILES['f_upload']['type'] == false && $_FILES['f_upload']['error'] == true && $_FILES['f_upload']['name'] == false && $_FILES['f_upload']['tmp_name'] == false)){
                
                $avatar_img = '';
                
            } else {
                
                if($_FILES['f_upload']['size'] <= 0) {
                    
                    throw new FileUploadException('The picture is too large');                   
                }
                
                if(($_FILES['f_upload']['type'] != "image/jpeg") && ($_FILES['f_upload']['type'] != "image/jpg") && ($_FILES['f_upload']['type'] != "image/JPG") && ($_FILES['f_upload']['type'] != "image/png")) {
                    
                    throw new FileUploadException('Invalid file format');                   
                }
                
                if ($_FILES['f_upload']['error'] > 0) {
                    
                    throw new FileUploadException('Error is happend');
                }

                $avatar_img = uniqid() . $_FILES['f_upload']['name'];
                $avatar_img = str_replace(' ', '_', $avatar_img);
                move_uploaded_file($_FILES['f_upload']['tmp_name'], APP_PATH. 'resources/images/img_for_articles/' . $avatar_img);                
            }
            
            return $avatar_img;
    }
    
    /**
     * 
     * @param int $id
     */
    public function UpdateArticlePicture($id) 
    {
        $article = $this->GetById($this->validator->Numeric($id));
        $article->image = $this->validator->TestInput($this->UploadArticlePicture());
        $article->Update();
    } 
}
