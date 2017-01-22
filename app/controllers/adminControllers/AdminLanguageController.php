<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

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
     * Index method
     */
    public function index()
    {
	$this->view('modules/mod_embedded/mod_languages/admin/index');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_languages/admin/addNew');
    }
    
    public function store()
    {
        $this->view('modules/mod_embedded/mod_languages/admin/addNew');
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_languages/admin/edit');
    }
    
    public function update()
    {
        $this->view('modules/mod_embedded/mod_languages/admin/edit');
    }
    
    public function destroy()
    {
        echo 'Delete method';
    }
}