<?php

namespace app\controllers;

use app\controllers\Controller as Controller;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\factories\LoadObjectFactory as Factory;
use Exception;

/**
 * Description of SidebarController
 *
 * @author Vera
 */
class SidebarController extends Controller
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
    protected $sidebarContent;

    
    /**
     * Construct
     */
    public function __construct() 
    {
        $this->sidebarContent = Factory::GetObject('app\models\News');
    }

    /**
     * 
     * This method return rss.
     * Index method
     */
    public function index()
    {
        try {
            
            $itemsFirst = $this->sidebarContent->GetMainNews(['http://mondo.rs/rss/2/Info', 'http://mondo.rs/rss/35/posao', 'http://www.b92.net/info/rss/automobili.xml', 'http://www.b92.net/info/rss/vesti.xml', 'http://www.b92.net/info/rss/zdravlje.xml']);

            $this->view('modules/mod_external/mod_life_template/mod_sidebar/index', ['itemsFirst' => $itemsFirst]);
            
        } catch (ItemNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_external/mod_life_template/mod_sidebar/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_external/mod_life_template/mod_sidebar/index', ['message' => $message]);
        }
    }
}
