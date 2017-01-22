<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminUserController
 *
 * @author Vera
 */
class AdminUserController extends Controller
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
	$this->view('modules/mod_embedded/mod_user/admin/index');
    }
    
    /**
        * Update method
        */
    public function update()
    {
        $this->view('modules/mod_embedded/mod_user/admin/index');
    }
}