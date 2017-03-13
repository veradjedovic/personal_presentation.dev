<?php

namespace app\models;

use app\models\Model as Model;
use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use app\exceptions\ValidatorException as ValidatorException;
use app\factories\LoadObjectFactory as Factory;
use app\traits\SetStatusTrait as SetStatusTrait;


/**
 * Class Article
 *
 * @author Vera
 */
class Article extends Model
{
    use SetStatusTrait;
    
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
         *
         * @var object
         */
        protected $file_upload;
        
        /**
         *
         * @var string
         */
        protected $file_path = 'resources/images/img_for_articles';


        /**
         * Construct
         */
        public function __construct()
        {
            $this->validator = Factory::GetObject('app\classes\Validator');
            $this->file_upload = Factory::GetObject('app\jobs\FileUploadJob');
        }

        /**
         * 
         * @param int $id
         * @return array
         * @throws ArticleNotFoundException
         */
        public function GetVisibleArticle($id)
        {      
            $fields = static::$table . ".title, " . static::$table . ".content, " . static::$table . ".image, " . static::$table . ".updated_at, user_profiles.name as author_name, user_profiles.surname as author_surname";        

            $q = " LEFT JOIN user_profiles
                  ON " . static::$table . ".author_id = user_profiles.id
                  WHERE " . static::$table . ".status = " . ARTICLE_VISIBLE . "
                  AND " . static::$table . ".page_id = {$id}
                  ORDER BY " . static::$table . ".updated_at DESC 
                  LIMIT 0 , 10";

            $articles = $this->GetAll($fields, $q);

            if(!$articles) {

                    throw new ArticleNotFoundException('Nije pronadjen ni jedan clanak.');
                }

            return $articles;
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
         */
        protected function UploadArticlePicture()
        {
            $file = $this->file_upload->UploadPicture($this->file_path);
            
            return $file;
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
