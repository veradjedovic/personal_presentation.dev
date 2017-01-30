<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
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
     * Construct
     */
    public function __construct() 
    {
        $this->menuModule = new AdminMenuController();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $this->view('modules/mod_embedded/mod_article/admin/index');
        
        } catch (Exception $ex) {
            
            $message = 'Nema padataka';
            
            $this->view('modules/mod_embedded/mod_article/admin/index', ['messageException' => $message]);
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