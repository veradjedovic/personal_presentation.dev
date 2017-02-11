<?php

namespace app\controllers;

use app\models\User as User;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use Exception as Exception;

/**
 * Description of UserController
 *
 * @author Vera
 */
class AuthController extends Controller
{
    /**
       *
       * @var string 
       */
    public $layout = '';
    
    /**
     *
     * @var object
     */
    protected $user;
    

    /**
     * Construct
     */
    public function __construct() 
    {
        $this->user = new User();
    }

    /**
       * Index method
       */
    public function index()
    {
        echo 'hello user';
    }
    
    /**
     * GetLogin method
     */
    public function getlogin()
    {
        
        $this->view('login');
    }
    
    /**
     * 
     * @return json/view
     */
    public function postlogin() 
    {
        try {
            
            $this->user->userLogin();
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]); 
            
        } catch (CollectionNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Not valid data', 'error'=> true]);
        }
    }
    
    /**
     * 
     * @return json/view
     */
    public function getlogout() 
    {
        try {
            
            $this->user->logout();
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Error', 'error'=> true]);
        }
    }
}
