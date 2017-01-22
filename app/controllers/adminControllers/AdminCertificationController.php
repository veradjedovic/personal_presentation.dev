<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminCertificationController
 *
 * @author Vera
 */
class AdminCertificationController extends Controller
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
	$this->view('modules/mod_embedded/mod_certifications/admin/index');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_certifications/admin/addNew');
    }
    
    public function store()
    {
        echo 'Certif store';
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_certifications/admin/edit');
    }
    
    public function update()
    {
        echo 'Certif update';
    }
    
    public function destroy()
    {
        echo 'Certification delete method';
    }
}