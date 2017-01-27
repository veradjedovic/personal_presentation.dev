<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\ModulePage as ModulePage;
use app\models\User as User;
use app\classes\Session as Session;
use app\classes\Validator as Validator;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
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
    protected $modulePage;
    
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
    protected $session;


    /**
     * Construct
     */
    public function __construct() 
    {
        $this->modulePage = new ModulePage();
        $this->user = new User();
        $this->validator = new Validator();
        $this->session = new Session();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $adminMenu = $this->modulePage->GetAdminPages();
            
            $user = $this->user->GetById(1);
            
            $this->view('modules/mod_embedded/mod_user/admin/index', ['adminMenu' => $adminMenu, 'user' => $user]);
            
        } catch (PagesNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => 'Linkovi nisu pronadjeni']);
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
            
        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (PagesNotFoundException $ex) {
              
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $ex->getMessage()]);
            
        } catch (Exception $ex) {

            return json_encode(['message' => 'Neispravni podaci']);
        }      
    }  
}