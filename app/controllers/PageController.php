<?php 

namespace app\controllers;

use app\controllers\Controller as Controller;
use app\models\Page as Page;
use Exception;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\models\ModulePage as ModulePage;

/**
 * Description of PageController
 *
 * @author Vera
 */
class PageController extends Controller
{
        /**
         *
         * @var string
         */
	public $layout = 'lifestyle';
        
        /**
         *
         * @var object
         */
        public $page;
        
        /**
         *
         * @var object
         */
        public $modulePage;


        /**
         * Construct
         */
        public function __construct(Page $page, ModulePage $modulePage) 
        {
            $this->page = $page;  
            $this->modulePage = $modulePage;
        }

        /**
         * Index method
         */
	public function index()
	{
            try {   
                
		$pages = $this->page->GetWebPages();
                $page = $this->page->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 1);  

                $modulesOfPage = $this->modulePage->GetVisibleModulesOfPage($page->id);
        
		$this->view('index', array('pages' => $pages, 'page' => $page, 'modulesOfPage' => $modulesOfPage));
                
            } catch (PagesNotFoundException $e) {
                
                echo $e->getMessage();
                
            } catch (ItemNotFoundException $e) {
                
                header('Location: /');
                
            } catch (CollectionNotFoundException $e) {
                
                echo $e->getMessage();
                
            } catch (Exception $e) {
               
                echo 'Not found';
            }
	}
}