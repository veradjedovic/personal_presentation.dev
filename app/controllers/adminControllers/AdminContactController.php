<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\models\Contact as Contact;
use app\exceptions\ContactNotFoundException as ContactNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\DeleteNotExecutedException as DeleteNotExecutedException;
use Exception as Exception;

/**
 * Description of AdminContactController
 *
 * @author Vera
 */
class AdminContactController extends AdminController
{
    /**
     *
     * @var object
     */
    protected $contact;


    /**
     * Construct
     */
    public function __construct( Contact $contact )
    {
        parent::__construct();

        $this->contact = $contact;
    }

    /**
     * Index method
     */
    public function index()
    {
        try{

            $messages = $this->contact->GetVisibleMessage();
        
            $this->view('modules/mod_embedded/Contact/admin/index', ['messages' => $messages]);
        
        } catch (ContactNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/Contact/admin/index', ['messageException' => $message]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/Contact/admin/index', ['messageException' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/Contact/admin/index', ['messageException' => $message]);
        }
    }
    
    /**
     * NewMessage method
     */
    public function newMessage()
    {
        try{
            
            $this->view('modules/mod_embedded/Contact/admin/newMessage');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Contact/admin/newMessage', ['messageException' => 'Nema podataka']);
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

            $message = $this->contact->SetStatusRead((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');

            $this->view('modules/mod_embedded/Contact/admin/show' , ['messageOne' => $message]);
        
        } catch (ItemNotFoundException $ex) {

            $this->view('modules/mod_embedded/Contact/admin/show', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Contact/admin/show', ['messageException' => 'Nema podataka']);
        }
    }
    
    public function sendEmailFromAdmin() 
    {
        dd($_POST);
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        
        try {
            
            $this->contact->Delete((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Message deleted', 'id' => $_GET['id'], 'error'=> false]);
            
        } catch (DeleteNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Message is not deleted', 'error'=> true]);
        }


    }
}