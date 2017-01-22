<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminContactController
 *
 * @author Vera
 */
class AdminContactController extends Controller
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
	$this->view('modules/mod_embedded/mod_contact/admin/index');
    }
    
    public function newMessage()
    {
        $this->view('modules/mod_embedded/mod_contact/admin/newMessage');
    }
    
    public function sendEmail()
    {
        echo 'Message sent';
    }
    
    public function show()
    {
	$this->view('modules/mod_embedded/mod_contact/admin/show');
    }
    
    public function destroy()
    {
        echo 'Delete message';
    }
}