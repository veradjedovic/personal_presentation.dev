<?php

namespace app\controllers;

use app\factories\LoadObjectFactory as Factory;
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
        $this->experience = Factory::GetObject('app\models\Experience');
        $this->builder = Factory::GetObject('app\builders\ExperienceBuilder');
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
            
            echo "<section class = 'section_of_modules'><h1>Radno iskustvo</h1><p>{$ex->getMessage()}</p></section>";
                       
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Radno iskustvo</h1><p>Nema podataka o radnom iskustvu.</p></section>";
            
        }
    }
}
