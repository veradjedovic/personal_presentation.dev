<?php

namespace app\controllers;

use app\models\Experience as Experience;
use app\builders\ExperienceBuilder as ExperienceBuilder;
use app\exceptions\ExperienceNotFoundException as ExperienceNotFoundException;
use Exception;

/**
 * Description of ExperienceController
 *
 * @author Vera
 */
class ExperienceController extends Controller
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
    public $experience; 
    
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
        $this->experience = new Experience();
        $this->builder = new ExperienceBuilder();
    }
    
    /**
       * Index method
       */
    public function index()
    {
        try {
            
            $experience = $this->builder->GetVisibleExperience();

            $this->view('modules/mod_embedded/mod_experience/experience', ['experience' => $experience]);
            
        } catch (ExperienceNotFoundException $ex) {
            
            echo "<h1>Radno iskustvo</h1><p>{$ex->getMessage()}</p>";
                       
        } catch (Exception $ex) {
            
            echo "<h1>Radno iskustvo</h1><p>Nema podataka o radnom iskustvu.</p>";
            
        }
    }
}
