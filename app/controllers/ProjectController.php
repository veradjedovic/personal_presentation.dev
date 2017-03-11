<?php

namespace app\controllers;

use app\factories\LoadObjectFactory as Factory;
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
        $this->projects = Factory::GetObject('app\models\Project');
        $this->builder = Factory::GetObject('app\builders\ProjectBuilder');
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
