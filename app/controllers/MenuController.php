<?php

namespace app\controllers;

use app\controllers\Controller as Controller;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\factories\LoadObjectFactory as Factory;
use Exception;

/**
 * Description of MenuController
 *
 * @author Vera
 */
class MenuController extends Controller
{
    /**
     *
     * @var string
     */
    public $layout = '';
    
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
    }

    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $pages = $this->page->GetWebPages();
        
            $this->view('modules/mod_external/mod_life_template/mod_menu/index', ['pages' => $pages]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_external/mod_life_template/mod_menu/index', ['message' => $message]);
            
        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_external/mod_life_template/mod_menu/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_external/mod_life_template/mod_menu/index', ['message' => $message]);
        }
    }
}
