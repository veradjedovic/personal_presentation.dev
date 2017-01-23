<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\ModulePage as ModulePage;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use Exception as Exception;

/**
 * Description of AdminPublicationAuthorController
 *
 * @author Vera
 */
class AdminPublicationAuthorController extends Controller
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

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor', ['adminMenu' => $adminMenu]);
        
        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {
            
            $adminMenu = $this->modulePage->GetAdminPages();

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor', ['adminMenu' => $adminMenu]);

        } catch (PagesNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['message' => $message]);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        echo 'Store method';
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {
            
            $adminMenu = $this->modulePage->GetAdminPages();

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor', ['adminMenu' => $adminMenu]);
        
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
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        echo 'Delete method';
    }
}