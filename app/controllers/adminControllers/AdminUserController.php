<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\classes\Session as Session;
use app\models\User as User;
use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use Exception as Exception;


/**
 * Description of AdminUserController
 *
 * @author Vera
 */
class AdminUserController extends AdminController
{   
    /**
     *
     * @var object
     */
    protected $user;
    
    /**
     *
     * @var object
     */
    protected $validator;


    /**
     * Construct
     */
    public function __construct( User $user, Validator $validator ) 
    {
        parent::__construct();

        $this->user = $user;
        $this->validator = $validator;
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $user = $this->user->GetById(Session::get('id') ? Session::get('id') : '');
            
            $this->view('modules/mod_embedded/mod_user/admin/index', ['user' => $user]);
            
        } catch (ItemNotFoundException $ex) {

            $this->view('modules/mod_embedded/mod_user/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_user/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        try {   

            $this->user->UpdateUser();

            return json_encode(['message' => 'Successful update']);
        
        } catch (ValidatorException $ex) {

            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (ItemNotFoundException $ex) {

            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (Exception $ex) {

            return json_encode(['message' => 'Neispravni podaci']);
        }      
    }  
}