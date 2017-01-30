<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\Contact as Contact;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use app\exceptions\ContactNotFoundException as ContactNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
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
    protected $contact;
    
    /**
     *
     * @var object
     */
    protected $menuModule;


    /**
     * Construct
     */
    public function __construct()
    {
        $this->contact = new Contact();
        $this->menuModule = new AdminMenuController();
    }

    /**
     * Index method
     */
    public function index()
    {
        try{

            $messages = $this->contact->GetVisibleMessage();
        
            $this->view('modules/mod_embedded/mod_contact/admin/index', ['messages' => $messages]);
        
        } catch (ContactNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_contact/admin/index', ['messageException' => $message]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_contact/admin/index', ['messageException' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_contact/admin/index', ['messageException' => $message]);
        }
    }
    
    /**
     * NewMessage method
     */
    public function newMessage()
    {
        try{
            
            $this->view('modules/mod_embedded/mod_contact/admin/newMessage');
        
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_contact/admin/newMessage', ['messageException' => $message]);
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
            
            $this->view('modules/mod_embedded/mod_contact/admin/show');
        
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_contact/admin/show', ['messageException' => $message]);
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