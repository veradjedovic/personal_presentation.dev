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
        * Consrtuct
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
            
            echo "<h1>Obrazovanje</h1><p>{$ex->getMessage()}</p>";
            
        } catch (Exception $ex) {
            
            echo "<h1>Obrazovanje</h1><p>Nema informacija.</p>";
        }
    }
}
