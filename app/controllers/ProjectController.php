<?php

namespace app\controllers;

use app\models\Project as Project;
use app\builders\ProjectBuilder as ProjectBuilder;
use app\exceptions\ProjectsNotFoundException as ProjectsNotFoundException;
use Exception;

/**
 * Description of ProjectController
 *
 * @author Vera
 */
class ProjectController extends Controller
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
    protected $projects;
    
    /**
     *
     * @var object
     */
    protected $builder;


    /**
     * Construct
     */
    public function __construct()
    {
        $this->projects = new Project();
        $this->builder = new ProjectBuilder();
    }
    
    /**
     * Index method
     */
    public function index()
    {
	try {
            
            $projects = $this->builder->GetVisibleProjects();
            
            $this->view('modules/mod_embedded/mod_projects/projects', ['projects' => $projects]);
            
        } catch (ProjectsNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Projekti</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Projekti</h1><p>Nema projekata.</p></section>";
        }	
    }
}
