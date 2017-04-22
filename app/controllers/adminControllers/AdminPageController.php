<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use Exception as Exception;

/**
 * Description of AdminPageController
 *
 * @author Vera
 */
class AdminPageController extends AdminController
{
    /**
     * Construct
     */
    public function __construct() 
    {
        parent::__construct();
    }   
    
   /**
     * Index method
     */
    public function index()
    {
        try {

            $this->view('modules/mod_embedded/Page/admin/index');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Page/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $this->view('modules/mod_embedded/Page/admin/addNew');
        
        } catch (Exception $ex) {

            $this->view('modules/mod_embedded/Page/admin/addNew', ['messageException' => 'Nema podataka']);
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

            $this->view('modules/mod_embedded/Page/admin/edit');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Page/admin/edit', ['messageException' => 'Nema podataka']);
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