<?php

namespace app\controllers;

/**
 * Description of ContactController
 *
 * @author Vera
 */
class ContactController extends Controller
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
	$contact['name'] = 'Verrrffdfdf';
	$contact['surname'] = 'Djeddddfdfdfd';

	$this->view('modules/mod_embedded/mod_contact/contact', ['contact' => $contact]);
    }
}
