<?php

namespace app\controllers;

use app\models\Page as Page;
use app\builders\ArticleBuilder as ArticleBuilder;
use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use Exception;

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
    protected $builder;
    
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
        $this->page = new Page();
        $this->builder = new ArticleBuilder();
    }

    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $page = $this->page->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 1);
            $articles = $this->builder->GetVisibleArticle($page->id);
           
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
