<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

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
     * Index method
     */
    public function index()
    {
	$this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');
    }
    
    public function store()
    {
        $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');
    }
    
    public function update()
    {
        $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthor');
    }
    
    public function destroy()
    {
        echo 'Delete method';
    }
}