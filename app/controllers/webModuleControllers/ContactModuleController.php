<?php

namespace app\controllers\webModuleControllers;

use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use Exception as Exception;
use app\factories\LoadObjectFactory as Factory;
use app\controllers\Controller as Controller;

/**
 * Description of ContactModuleController
 *
 * @author Vera
 */
class ContactModuleController extends Controller
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
        $this->view('modules/mod_embedded/Contact/contact');
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
            
            return json_encode(['message' => 'Poruka je uspesno poslata', 'error' => false]);
                  
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (InsertNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Neispravan email', 'error' => true]);
        }
    }
}
