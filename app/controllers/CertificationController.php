<?php

namespace app\controllers;

use Exception as Exception;
use app\exceptions\CertificationsNotFoundException as CertificationsNotFoundException;
use app\factories\LoadObjectFactory as Factory;

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
    protected $certification;
    
    /**
     * Construct
     */
    public function __construct() 
    {
        $this->certification = Factory::GetObject('app\models\Certification');
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try{
            
            $certifications = $this->certification->GetCertifVisible();

            $this->view('modules/mod_embedded/Certification/certifications', ['certifications'=> $certifications]);
            
        } catch (CertificationsNotFoundException $ex) {

            echo "<section class = 'section_of_modules'><h1>Sertifikati</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {

            echo "<section class = 'section_of_modules'><h1>Sertifikati</h1><p>Nema sertifikata.</p></section>";
        }
        
	
    }
}
