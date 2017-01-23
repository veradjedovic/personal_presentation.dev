<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\ModulePage as ModulePage;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use Exception as Exception;

/**
 * Description of AdminProfileController
 *
 * @author Vera
 */
class AdminProfileController extends Controller
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
     * Construct
     */
    public function __construct() 
    {
        $this->modulePage = new ModulePage();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $adminMenu = $this->modulePage->GetAdminPages();
        
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['adminMenu' => $adminMenu]);
            
        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
        }
    }
    
    /**
        * Update method
        */
    public function update()
    {
        echo 'Update method';
    }
}