<?php

namespace app\controllers;

use app\models\Contact as Contact;
use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use Exception as Exception;

/**
 * Description of ContactController
 *
 * @author Vera
 */
class ContactController extends Controller
{
    /**
     *
     * @var object 
     */
    public $layout = '';
    
    /**
     *
     * @var object 
     */
    protected $contact;
    
    /**
     *
     * @var object 
     */
    protected $validator;


    /**
     * Construct
     */
    public function __construct()
    {
        $this->contact = new Contact();
        $this->validator = new Validator();
    }

    /**
     * Index method
     */
    public function index()
    {          
        $this->view('modules/mod_embedded/mod_contact/contact');      
    }
    
    /**
     * 
     * @return json object
     */
    public function insert()
    {
        try {
            
            return $this->validateInputFields();
                  
        } catch (ValidatorException $ex) {
            
            return json_encode($ex->getMessage());
            
        } catch (InsertNotExecutedException $ex) {
            
            return json_encode($ex->getMessage());
            
        } catch (Exception $ex) {
            
            return json_encode('Neispravan email');
        }
    }
    
    /**
     * 
     * @return json object
     */
    protected function validateInputFields() 
    {      
        if(!empty(trim($_POST['tb_subject'])) && !empty(trim($_POST['tb_email'])) && !empty(trim($_POST['tb_message'])) && isset($_POST['btn_submit'])) {       

            $this->contact->subject = htmlentities(trim($_POST['tb_subject']));
            $this->contact->email_from = trim($_POST['tb_email']);
            
            $this->validateEmail($this->contact->email_from);
            
            $this->contact->content = htmlentities(trim($_POST['tb_message']));
            $this->contact->status = MESSAGE_VISIBLE;
            $this->contact->created_at = date('Y-m-d H:i:s');
            $this->contact->Insert();  

            return json_encode('Poruka je uspesno poslata');

        } else {

            return json_encode('Morate popuniti sva polja');
        }
    }
    
    /**
     * 
     * @throws ValidatorException
     */
    protected function validateEmail($email) 
    {
        if(!$this->validator->Email($email)) {

            throw new ValidatorException('Unesite ispravnu email adresu!');
        }          

    }
}
