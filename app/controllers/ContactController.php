<?php

namespace app\controllers;

use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use Exception as Exception;
use app\factories\LoadObjectFactory as Factory;

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
        $this->contact = Factory::GetObject('app\models\Contact');
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
     * Insert method
     * @return json
     */
    public function insert()
    {
        try {
            
            $this->contact->InsertData();
            
            return json_encode(['message' => 'Poruka je uspesno poslata']);
                  
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (InsertNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Neispravan email']);
        }
    }
}
