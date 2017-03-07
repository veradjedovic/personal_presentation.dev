<?php

namespace app\controllers;

use app\models\Education as Education;
use app\exceptions\EducationNotFoundException as EducationNotFoundException;
use Exception;

/**
 * Description of EducationController
 *
 * @author Vera
 */
class EducationController extends Controller
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
    protected $education;
    
    /**
     * Construct
     */
    public function __construct() 
    {
        $this->education = new Education();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $education = $this->education->GetEducationVisible();

            $this->view('modules/mod_embedded/mod_education/education', ['education'=>$education]);
        
        } catch (EducationNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Obrazovanje</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Obrazovanje</h1><p>Nema informacija.</p></section>";
        }
    }
}
