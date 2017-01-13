<?php 

namespace app\controllers;

use app\controllers\Controller;


class AdminController extends Controller
{
   /**
     *
     * @var string 
     */
    public $layout = 'default';
    
   /**
     * Index method
     */
    public function index()
    {
	$this->view('projects');
    }
}