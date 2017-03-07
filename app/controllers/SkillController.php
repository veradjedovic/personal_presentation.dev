<?php

namespace app\controllers;

use app\models\Skill as Skill;
use app\exceptions\SkillsNotFoundException as SkillsNotFoundException;
use Exception;

/**
 * Description of SkillController
 *
 * @author Vera
 */
class SkillController extends Controller
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
    public $skill;
    
    
    /**
     * Construct
     */
    public function __construct()
    {
       $this->skill = new Skill(); 
    }

    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $skills = $this->skill->GetSkillsVisible();
            
            $this->view('modules/mod_embedded/mod_skills/skills', ['skills' => $skills]);
            
        } catch (SkillsNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Znanja i vestine</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Znanja i vestine</h1><p>Nema informacija o posebnim vestinama.</p></section>";
        }	
    }
}
