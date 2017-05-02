<?php

namespace app\controllers\webModuleControllers;

use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use Exception;
use app\factories\LoadObjectFactory as Factory;
use app\controllers\Controller as Controller;

/**
 * Description of ArticleModuleController
 *
 * @author Vera
 */
class ArticleModuleController extends Controller
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
     * @var object
     */
    protected $userProfile;

    
    /**
     * Construct
     */
    public function __construct() 
    {
        $this->page = Factory::GetObject('app\models\Page');
        $this->article = Factory::GetObject('app\models\Article');
        $this->userProfile = Factory::GetObject('app\models\UserProfile');
    }

    /**
     * Index method
     */
    public function index()
    {
        try {

            $page = $this->page->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 1);
            $articles = $this->article->GetVisibleArticle($page->id);

            $this->view('modules/mod_embedded/Article/article', ['articles' => $articles]);

        } catch (ArticleNotFoundException $ex) {

            echo "<section class = 'section_of_modules'><p>{$ex->getMessage()}</p></section>";

        } catch (ItemNotFoundException $ex) {

            header('Location: /');

        } catch (CollectionNotFoundException $ex) {

            echo "<section class = 'section_of_modules'><p>{$ex->getMessage()}</p></section>";

        } catch (Exception $ex) {

            echo "<section class = 'section_of_modules'><p>Nema clanaka.</p></section>";
        }
    }
}
