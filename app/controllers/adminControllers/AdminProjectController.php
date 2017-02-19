<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\Project as Project;
use app\models\ProjectMember as ProjectMember;
use app\classes\Session as Session;
use app\classes\Datetime as Datetime;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
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
class AdminProjectController extends Controller
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
    public function __construct() 
    {
        $this->menuModule = new AdminMenuController();
        $this->project = new Project();
        $this->projectMember = new ProjectMember();
        $this->datetime = new Datetime(date('Y')-50, date('Y'));
    }
    
   /**
     * Index method
     */
    public function index()
    {
        try {
            
            $projects = $this->project->GetAllProjects();

            $this->view('modules/mod_embedded/mod_projects/admin/index', ['projects' => $projects]);
        
        } catch (ProjectsNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/index', ['messageException' => 'Nema podataka']);
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
            
            $this->view('modules/mod_embedded/mod_projects/admin/addNew', ['year_begin' => $year_begin, 'year_end' => $year_end, 'months' => $months]);
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/addNew', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Store method
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

            $this->view('modules/mod_embedded/mod_projects/admin/edit', ['project' => $project, 'year_begin' => $year_begin, 'year_end' => $year_end, 'months' => $months]);
        
        }  catch (ItemNotFoundException $ex) {           
            
            $this->view('modules/mod_embedded/mod_projects/admin/edit', ['messageException' => $ex->getMessage()]);

        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/edit', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Update method
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
     * Destroy method
     */
    public function destroy()
    {
        echo 'Delete method';
    }
}