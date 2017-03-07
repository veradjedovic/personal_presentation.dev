<?php

namespace app\controllers;

use app\models\Publication as Publication;
use app\builders\PublicationBuilder as PublicationBuilder;
use app\exceptions\PublicationsNotFoundException as PublicationsNotFoundException;
use Exception;

/**
 * Description of PublicationController
 *
 * @author Vera
 */
class PublicationController extends Controller
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
    protected $publication;
    
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
        $this->publication = new Publication();
        $this->builder = new PublicationBuilder();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $publications = $this->builder->GetVisiblePublications();

            $this->view('modules/mod_embedded/mod_publications/publications', ['publications' => $publications]);
            
        } catch (PublicationsNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Izdanja</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Izdanja</h1><p>Nema ni jednog izdanja.</p></section>";
        }
    }
}
