<?php

namespace app\controllers\webModuleControllers;

use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ExperienceNotFoundException as ExperienceNotFoundException;
use Exception;
use app\controllers\Controller as Controller;

/**
 * Description of ExperienceModuleController
 *
 * @author Vera
 */
class ExperienceModuleController extends Controller
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
     * Construct
     */
    public function __construct() 
    {
        $this->experience = Factory::GetObject('app\models\Experience');
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $experience = $this->experience->GetVisibleExperience();

            $this->view('modules/mod_embedded/Experience/experience', ['experience' => $experience]);
            
        } catch (ExperienceNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Radno iskustvo</h1><p>{$ex->getMessage()}</p></section>";
                       
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Radno iskustvo</h1><p>Nema podataka o radnom iskustvu.</p></section>";
            
        }
    }
}
