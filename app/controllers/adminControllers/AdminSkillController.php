<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminSkillController
 *
 * @author Vera
 */
class AdminSkillController extends Controller
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
	$this->view('modules/mod_embedded/mod_skills/admin/index');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_skills/admin/addNew');
    }
    
    public function store()
    {
        $this->view('modules/mod_embedded/mod_skills/admin/addNew');
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_skills/admin/edit');
    }
    
    public function update()
    {
        $this->view('modules/mod_embedded/mod_skills/admin/edit');
    }
    
    public function destroy()
    {
        echo 'Delete method';
    }
}