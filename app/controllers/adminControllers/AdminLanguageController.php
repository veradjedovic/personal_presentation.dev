<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use Exception as Exception;

/**
 * Description of AdminLanguageController
 *
 * @author Vera
 */
class AdminLanguageController extends Controller
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
            
            $this->view('modules/mod_embedded/mod_languages/admin/index');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_languages/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $this->view('modules/mod_embedded/mod_languages/admin/addNew');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_languages/admin/addNew', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        echo 'Store method';
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {

            $this->view('modules/mod_embedded/mod_languages/admin/edit');
        
        } catch (Exception $ex) {
                    
            $this->view('modules/mod_embedded/mod_languages/admin/edit', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        echo 'Update method';
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        echo 'Delete method';
    }
}