<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\models\Project as Project;
use app\models\ProjectMember as ProjectMember;
use app\classes\Session as Session;
use app\classes\Datetime as Datetime;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ProjectsNotFoundException as ProjectsNotFoundException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use Exception as Exception;

/**
 * Description of AdminProjectController
 *
 * @author Vera
 */
class AdminProjectController extends AdminController
{
    /**
     *
     * @var object
     */
    protected $project;
    
    /**
     *
     * @var object
     */
    protected $datetime;
    
    /**
     *
     * @var object
     */
    protected $projectMember;

    /**
     * Construct
     */
    public function __construct( Project $project, ProjectMember $projectMember, Datetime $datetime ) 
    {
        parent::__construct();

        $this->project = $project;
        $this->projectMember = $projectMember;
        $this->datetime = $datetime;
    }
    
   /**
     * Index method
     */
    public function index()
    {
        try {
            
            $projects = $this->project->GetAllProjects();

            $this->view('modules/mod_embedded/Project/admin/index', ['projects' => $projects]);
        
        } catch (ProjectsNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $year_begin = $this->datetime->getYearBegin();
            $year_end = $this->datetime->getYearEnd();
            $months = $this->datetime->getMonth();
            
            $this->view('modules/mod_embedded/Project/admin/addNew', ['year_begin' => $year_begin, 'year_end' => $year_end, 'months' => $months]);
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/addNew', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * 
     * Store method
     * @return json
     */
    public function store()
    {
        try {

            $project_id = $this->project->InsertProject();
            $this->projectMember->InsertProjectMember((Session::get('name') ? Session::get('name') : ''), (Session::get('surname') ? Session::get('surname') : ''), $project_id);
            
            return json_encode(['message' => 'Project successful insert', 'error' => false]);
        
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
            
            $project = $this->project->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            $year_begin = $this->datetime->getYearBegin();
            $year_end = $this->datetime->getYearEnd();
            $months = $this->datetime->getMonth();

            $this->view('modules/mod_embedded/Project/admin/edit', ['project' => $project, 'year_begin' => $year_begin, 'year_end' => $year_end, 'months' => $months]);
        
        }  catch (ItemNotFoundException $ex) {           
            
            $this->view('modules/mod_embedded/Project/admin/edit', ['messageException' => $ex->getMessage()]);

        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/Project/admin/edit', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * 
     * Update method
     * @return json
     */
    public function update()
    {
        try {
            
            $this->project->UpdateProject((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Project successful update', 'error' => false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * Method UpdateStatusVisible
     * @return json
     */
    public function updateStatusVisible()
    {
        try {
            
            $item = $this->project->SetStatusVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', PROJECT_VISIBLE);
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Project not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * Method UpdateStatusNotVisible
     * @return json
     */
    public function updateStatusNotVisible()
    {
        try {
            
            $item = $this->project->SetStatusNotVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', PROJECT_NOT_VISIBLE);
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Project not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * Destroy method
     * @return json
     */
    public function destroy()
    {
        try {
            
            $item = $this->project->SetStatusDeleted((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', PROJECT_DELETED);
            
            return json_encode(['message' => 'Project deleted', 'id' => $item->id, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Project not found', 'error'=> true]);
        }
    }
}