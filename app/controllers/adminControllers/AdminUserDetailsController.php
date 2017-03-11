<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\classes\Session as Session;
use app\exceptions\ProfileNotFoundException as ProfileNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use Exception as Exception;
use app\factories\LoadObjectFactory as Factory;

/**
 * Description of AdminUserDetailsController
 *
 * @author Vera
 */
class AdminUserDetailsController extends Controller
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
    protected $detailOfUser;
    
    /**
     * Construct
     */
    public function __construct() 
    {
        $this->detailOfUser = Factory::GetObject('app\models\UserProfile');
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $detailOfUser = $this->detailOfUser->GetUserProfile(Session::get('id') ? Session::get('id') : '');

            $this->view('modules/mod_external/mod_admin_template/mod_menu/userDetails', ['detailOfUser' => $detailOfUser]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_external/mod_admin_template/mod_menu/userDetails', ['message' => $message]);
            
        } catch (ProfileNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_external/mod_admin_template/mod_menu/userDetails', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_external/mod_admin_template/mod_menu/userDetails', ['message' => $message]);
        }
    }
}