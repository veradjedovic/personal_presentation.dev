<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\ProjectMember as ProjectMember;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use Exception as Exception;

/**
 * Description of AdminProjectMemberController
 *
 * @author Vera
 */
class AdminProjectMemberController extends Controller
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
    protected $menuModule;
    
    /**
     *
     * @var object
     */
    protected $project_member;


    /**
     * Construct
     */
    public function __construct() 
    {
        $this->menuModule = new AdminMenuController();
        $this->project_member = new ProjectMember();
    }
    
   /**
     * Index method
     */
    public function index()
    {
        try {

            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMembers');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMember', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMembers');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMember', ['messageException' => 'Nema podataka']);
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

            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMembers');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMembers', ['messageException' => 'Nema podataka']);
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