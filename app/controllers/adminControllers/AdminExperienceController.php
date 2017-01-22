<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminExperienceController
 *
 * @author Vera
 */
class AdminExperienceController extends Controller
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
	$this->view('modules/mod_embedded/mod_experience/admin/index');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_experience/admin/addNew');
    }
    
    public function store()
    {
        $this->view('modules/mod_embedded/mod_experience/admin/addNew');
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_experience/admin/edit');
    }
    
    public function update()
    {
        $this->view('modules/mod_embedded/mod_experience/admin/edit');
    }
    
    public function destroy()
    {
        echo 'Delete method';
    }
}