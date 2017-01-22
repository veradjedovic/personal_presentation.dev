<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;

/**
 * Description of AdminArticleController
 *
 * @author Vera
 */
class AdminArticleController extends Controller
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
	$this->view('modules/mod_embedded/mod_article/admin/index');
    }
    
    public function insert()
    {
        $this->view('modules/mod_embedded/mod_article/admin/addNew');
    }
    
    public function store()
    {
        echo 'Article Store method';
    }
    
    public function show()
    {
        $this->view('modules/mod_embedded/mod_article/admin/edit');
    }
    
    public function update()
    {
        echo 'Article Update method';
    }
    
    public function destroy()
    {
        echo 'Article delete method';
    }
}