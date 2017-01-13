<?php

namespace app\controllers;

/**
 * Description of PublicationAuthorController
 *
 * @author Vera
 */
class PublicationAuthorController extends Controller
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
	$data['name'] = 'Veeeeeraaaa';
	$data['surname'] = 'Djedovic';
//dd(json_decode(json_encode([$data, 'vera'])));
	return json_encode([$data, 'vera']);
    }
}
