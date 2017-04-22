<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\models\Article as Article;
use app\models\Page as Page;
use app\classes\Session as Session;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\FileUploadException as FileUploadException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use Exception as Exception;


/**
 * Description of AdminArticleController
 *
 * @author Vera
 */
class AdminArticleController extends AdminController
{   
    /**
     *
     * @var object
     */
    protected $article;
    
    /**
     *
     * @var object
     */
    protected $page;
    

    /**
     * Construct
     */
    public function __construct( Article $article, Page $page ) 
    {
        parent::__construct();
        
        $this->article = $article;
        $this->page = $page;
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $articles = $this->article->GetAllArticles();
            
            $this->view('modules/mod_embedded/Article/admin/index', ['articles' => $articles]);
        
        } catch (ArticleNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/Article/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/Article/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {

            $this->view('modules/mod_embedded/Article/admin/index', ['messageException' => 'Not found']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try{

            $pages = $this->page->GetWebPagesVisibleAndNotVisible();
            
            $this->view('modules/mod_embedded/Article/admin/addNew', ['pages' => $pages]);
        
        } catch (Exception $ex) {
            
            $message = 'Nema podataka';
            
            $this->view('modules/mod_embedded/Article/admin/addNew', ['messageException' => $message]);
        }
    }
    
    /**
     * 
     * Store method
     * @return json
     */
    public function store()
    {
        try {
            
            $this->article->InsertArticle(Session::get('id') ? Session::get('id') : 0);
            
            return json_encode(['message' => 'Successful inserted', 'error' => false]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (FileUploadException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (InsertNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => "Error is happend, data  aren't inserted!", 'error' => true]);
        }
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try{
            
            $article = $this->article->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            $pages = $this->page->GetWebPagesVisibleAndNotVisible();

            $this->view('modules/mod_embedded/Article/admin/edit', ['article' => $article, 'pages' => $pages]);
        
        } catch (ItemNotFoundException $ex) {           
            
            $this->view('modules/mod_embedded/Article/admin/edit', ['messageException' => $ex->getMessage()]);

        } catch (PagesNotFoundException $ex) {           
            
            $this->view('modules/mod_embedded/Article/admin/edit', ['messageException' => $ex->getMessage()]);

        } catch (CollectionNotFoundException $ex) {           
            
            $this->view('modules/mod_embedded/Article/admin/edit', ['messageException' => $ex->getMessage()]);

        } catch (Exception $ex) {
            
            $message = 'Nema podataka';
            
            $this->view('modules/mod_embedded/Article/admin/edit', ['messageException' => $message]);
        }
    }
    
    /**
     * 
     * Update method
     * @return json
     */
    public function update()
    {
        try {
            
            $this->article->UpdateArticle((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Successful update', 'error' => false]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Data not found!', 'error' => true]);
        }
    }
    
    /**
     * 
     * Method UpdateStatusVisible
     * @return json
     */
    public function updateStatusVisible()
    {
        try {
            
            $item = $this->article->SetStatusVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', ARTICLE_VISIBLE);
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Certification not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * Method UpdateStatusNotVisible
     * @return json
     */
    public function updateStatusNotVisible()
    {
        try {
            
            $item = $this->article->SetStatusNotVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', ARTICLE_NOT_VISIBLE);
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Certification not found', 'error'=> true]);
        }
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        try {
            
            $item = $this->article->SetStatusDeleted((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', ARTICLE_DELETED);
            
            return json_encode(['message' => 'Article deleted', 'id' => $item->id, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Article not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * UploadArticlePicture method
     * @return json
     */
    public function uploadArticlePicture() 
    {
        try {
            
            $this->article->UpdateArticlePicture((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Successful edit article picture', 'error' => false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (FileUploadException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Data not found!', 'error' => true]);
        }
    }
}