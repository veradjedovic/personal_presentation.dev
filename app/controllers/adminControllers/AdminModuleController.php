<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminModuleController
 *
 * @author Vera
 */
class AdminModuleController extends Controller
{
   /**
     *
     * @var string 
     */
    public $layout = 'admin';
    
   /**
     * Index method
     */
    public function index()
    {
	$this->view('modules/mod_embedded/mod_modules/admin/index');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_modules/admin/addNew');
    }
    
    public function store()
    {
        $this->view('modules/mod_embedded/mod_modules/admin/addNew');
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_modules/admin/edit');
    }
    
    public function update()
    {
        $this->view('modules/mod_embedded/mod_modules/admin/edit');
    }
    
    public function destroy()
    {
        echo 'Delete method';
    }
}