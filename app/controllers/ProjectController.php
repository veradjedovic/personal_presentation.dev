<?php

namespace app\controllers;

use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ProjectsNotFoundException as ProjectsNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
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
    protected $project;


    /**
     * Construct
     */
    public function __construct()
    {
        $this->project = Factory::GetObject('app\models\Project');
    }
    
    /**
     * Index method
     */
    public function index()
    {
	try {
            
            $projects = $this->project->GetVisibleProjects();
            
            $this->view('modules/mod_embedded/Project/projects', ['projects' => $projects]);
            
        } catch (ProjectsNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Projekti</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (CollectionNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Projekti</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Projekti</h1><p>Nema projekata.</p></section>";
        }	
    }
}
