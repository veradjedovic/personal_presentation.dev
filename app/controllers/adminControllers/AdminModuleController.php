<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use Exception as Exception;

/**
 * Description of AdminModuleController
 *
 * @author Vera
 */
class AdminModuleController extends AdminController
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

            $this->view('modules/mod_embedded/Module/admin/index');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Module/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $this->view('modules/mod_embedded/Module/admin/addNew');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Module/admin/addNew', ['messageException' => 'Nema podataka']);
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
            
            $this->view('modules/mod_embedded/Module/admin/edit');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Module/admin/edit', ['messageException' => 'Nema podataka']);
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