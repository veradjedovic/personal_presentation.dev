<?php

namespace app\controllers;

use app\models\Certification as Certification;
use Exception;
use app\exceptions\CertificationsNotFoundException as CertificationsNotFoundException;

/**
 * Description of CertificationController
 *
 * @author Vera
 */
class CertificationController extends Controller
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
    public $certification;
    
    /**
         * Construct
         */
    public function __construct() 
    {
        $this->certification = new Certification();
    }
    
    /**
       * Index method
       */
    public function index()
    {
        try{
            
            $certifications = $this->certification->GetCertifVisible();

            $this->view('modules/mod_embedded/mod_certifications/certifications', ['certifications'=> $certifications]);
            
        } catch (CertificationsNotFoundException $ex) {

            echo "<section class = 'section_of_modules'><h1>Sertifikati</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {

            echo "<section class = 'section_of_modules'><h1>Sertifikati</h1><p>Nema sertifikata.</p></section>";
        }
        
	
    }
}
