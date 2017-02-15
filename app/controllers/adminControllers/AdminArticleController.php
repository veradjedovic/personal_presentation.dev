<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\Article as Article;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use Exception as Exception;
/**
 * Description of AdminArticleController
 *
 * @author Vera
 */
class AdminArticleController extends Controller
{
   /**
     *
     * @var string 
     */
    public $layout = 'admin';
    
    /**
     *
     * @var object
     */
    protected $menuModule;
    
    /**
     *
     * @var object
     */
    protected $article;


    /**
     * Construct
     */
    public function __construct() 
    {
        $this->menuModule = new AdminMenuController();
        $this->article = new Article();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $articles = $this->article->GetAllArticles();
            
            $this->view('modules/mod_embedded/mod_article/admin/index', ['articles' => $articles]);
        
        } catch (ArticleNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_article/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_article/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {

            $this->view('modules/mod_embedded/mod_article/admin/index', ['messageException' => 'Not found']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try{

            $this->view('modules/mod_embedded/mod_article/admin/addNew');
        
        } catch (Exception $ex) {
            
            $message = 'Nema podataka';
            
            $this->view('modules/mod_embedded/mod_article/admin/addNew', ['messageException' => $message]);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        echo 'Article Store method';
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try{

            $this->view('modules/mod_embedded/mod_article/admin/edit');
        
        } catch (Exception $ex) {
            
            $message = 'Nema podataka';
            
            $this->view('modules/mod_embedded/mod_article/admin/edit', ['messageException' => $message]);
        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        echo 'Article Update method';
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        echo 'Article delete method';
    }
}