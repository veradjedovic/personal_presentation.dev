<?php

namespace app\controllers;

/**
 * Description of ModuleController
 *
 * @author Vera
 */
class ModuleController extends Controller
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
	$data['name'] = 'Verrr';
	$data['surname'] = 'Djeddd';

	dd($data);
    }
}
