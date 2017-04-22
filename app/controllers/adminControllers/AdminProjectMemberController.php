<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\models\ProjectMember as ProjectMember;
use app\models\Project as Project;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ProjectMembersNotFoundException as ProjectMembersNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use Exception as Exception;

/**
 * Description of AdminProjectMemberController
 *
 * @author Vera
 */
class AdminProjectMemberController extends AdminController
{
    /**
     *
     * @var object
     */
    protected $project_member;
    
    /**
     *
     * @var object
     */
    protected $project;


    /**
     * Construct
     */
    public function __construct( ProjectMember $project_member, Project $project ) 
    {
        parent::__construct();

        $this->project_member =$project_member;
        $this->project = $project;
    }
    
   /**
     * Index method
     */
    public function index()
    {
        try {

            $project = $this->project->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            $projectMembers = $this->project_member->GetAllVisibleMembers($project->id);
            
            $this->view('modules/mod_embedded/Project/admin/editProjectMembers', ['projectMembers' => $projectMembers, 'project_id' => $project->id]);
        
        } catch (ItemNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/editProjectMembers', ['messageException' => $ex->getMessage()]);
            
        } catch (ProjectMembersNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/editProjectMembers', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/editProjectMembers', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/editProjectMembers', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $this->view('modules/mod_embedded/Project/admin/editProjectMembers');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/editProjectMembers', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        try {
            
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_surname']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data are not exist');
            }
            
            $project_id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '';
            $project_member_id = $this->project_member->InsertProjectMember($_POST['tb_name'], $_POST['tb_surname'], $project_id);
            $projectMember = $this->project_member->GetById($project_member_id ? $project_member_id : '');
            
            return json_encode(['message' => 'Team member successful insert', 'error' => false, 'projectMember' => $projectMember]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (InsertNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        }  catch (Exception $ex) {
            
            return json_encode(['message' => 'Not inserted', 'error'=> true]);
        }
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {

            $this->view('modules/mod_embedded/Project/admin/editProjectMembers');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/editProjectMembers', ['messageException' => 'Nema podataka']);
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
        try {
            
            $item = $this->project_member->SetStatusDeleted((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', PROJECT_MEMBER_DELETED);
            
            return json_encode(['message' => 'Member of project is deleted', 'id' => $item->id, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Member of project is not found', 'error'=> true]);
        }
    }
}