<?php

namespace app\controllers;

use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use Exception;
use app\factories\LoadObjectFactory as Factory;

/**
 * Description of ArticleController
 *
 * @author Vera
 */
class ArticleController extends Controller
{
    /**
     *
     * @var object
     */
    public $layout = '';
    
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
    public function __construct() 
    {
        $this->page = Factory::GetObject('app\models\Page');
        $this->article = Factory::GetObject('app\models\Article');
    }

    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $page = $this->page->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 1);
            $articles = $this->article->GetVisibleArticle($page->id);
           
            $this->view('modules/mod_embedded/mod_article/article', ['articles'=>$articles]);
            
        } catch (ArticleNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><p>{$ex->getMessage()}</p></section>";
            
        } catch (ItemNotFoundException $ex) {
            
            header('Location: /');
            
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><p>Nema clanaka.</p></section>";
        }	
    }
}
