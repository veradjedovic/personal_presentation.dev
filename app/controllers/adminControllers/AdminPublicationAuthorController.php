<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use Exception as Exception;

/**
 * Description of AdminPublicationAuthorController
 *
 * @author Vera
 */
class AdminPublicationAuthorController extends Controller
{
   /**
     *
     * @var string 
     */
    public $layout = 'admin';
    
    /**
     *
     * @var object
     */
    protected $menuModule;


    /**
     * Construct
     */
    public function __construct() 
    {
        $this->menuModule = new AdminMenuController();
    }
    
   /**
     * Index method
     */
    public function index()
    {
        try {

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');

        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        echo 'Store method';
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        echo 'Update method';
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        echo 'Delete method';
    }
}