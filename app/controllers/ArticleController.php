<?php

namespace app\controllers;

/**
 * Description of ArticleController
 *
 * @author Vera
 */
class ArticleController extends Controller
{
    /**
       *
       * @var string 
       */
    public $layout = '';
    
    /**
       * Index method
       */
    public function index()
    {
	$d['name'] = 'V';
	$d['surname'] = 'Dj';

//        return $d;
	$this->view('modules/mod_embedded/mod_article/article', ['d'=>$d]);
    }
}
