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
        * @var obj 
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
            
            echo "<h1>Projekti</h1><p>{$ex->getMessage()}</p>";
            
        } catch (Exception $ex) {
            
            echo "<h1>Projekti</h1><p>Nema projekata.</p>";
        }	
    }
}
