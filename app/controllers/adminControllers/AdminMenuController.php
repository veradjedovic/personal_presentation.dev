<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use Exception as Exception;
use app\factories\LoadObjectFactory as Factory;

/**
 * Description of AdminProfileController
 *
 * @author Vera
 */
class AdminMenuController extends Controller
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
    protected $modulePage;
    
    /**
     * Construct
     */
    public function __construct() 
    {
        $this->modulePage = Factory::GetObject('app\models\ModulePage');
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $adminMenu = $this->modulePage->GetAdminPages();

            $this->view('modules/mod_external/mod_admin_template/mod_menu/menu', ['adminMenu' => $adminMenu]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_external/mod_admin_template/mod_menu/menu', ['message' => $message]);
            
        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_external/mod_admin_template/mod_menu/menu', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_external/mod_admin_template/mod_menu/menu', ['message' => $message]);
        }
    }
}