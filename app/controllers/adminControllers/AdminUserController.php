<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\User as User;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
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
class AdminUserController extends Controller
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
    protected $user;
    
    /**
     *
     * @var object
     */
    protected $validator;
    
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
        $this->user = new User();
        $this->validator = new Validator();
        $this->menuModule = new AdminMenuController();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $user = $this->user->GetById(1);
            
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