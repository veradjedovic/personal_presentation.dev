<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminProjectMemberController
 *
 * @author Vera
 */
class AdminProjectMemberController extends Controller
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
	$this->view('modules/mod_embedded/mod_projects/admin/editProjectMember');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_projects/admin/editProjectMember');
    }
    
    public function store()
    {
        $this->view('modules/mod_embedded/mod_projects/admin/editProjectMember');
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_projects/admin/editProjectMember');
    }
    
    public function update()
    {
        $this->view('modules/mod_embedded/mod_projects/admin/editProjectMember');
    }
    
    public function destroy()
    {
        echo 'Delete method';
    }
}