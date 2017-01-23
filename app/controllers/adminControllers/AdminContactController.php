<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\ModulePage as ModulePage;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use Exception as Exception;

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
     *
     * @var object
     */
    protected $modulePage;

    
    /**
     * Construct
     */
    public function __construct()
    {
        $this->modulePage = new ModulePage();
    }

    /**
     * Index method
     */
    public function index()
    {
        try{
            
            $adminMenu = $this->modulePage->GetAdminPages();
            
            $this->view('modules/mod_embedded/mod_contact/admin/index', ['adminMenu' => $adminMenu]);
        
        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
        }
    }
    
    /**
     * NewMessage method
     */
    public function newMessage()
    {
        try{
            
            $adminMenu = $this->modulePage->GetAdminPages();
            
            $this->view('modules/mod_embedded/mod_contact/admin/newMessage', ['adminMenu' => $adminMenu]);
        
        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
        }
    }
    
    /**
     * SendEmail method
     */
    public function sendEmail()
    {
        echo 'Message sent';
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try{
            
            $adminMenu = $this->modulePage->GetAdminPages();
            
            $this->view('modules/mod_embedded/mod_contact/admin/show', ['adminMenu' => $adminMenu]);
        
        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
        }
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        echo 'Delete message';
    }
}