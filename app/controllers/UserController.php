<?php

namespace app\controllers;

/**
 * Description of UserController
 *
 * @author Vera
 */
class UserController extends Controller
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
        echo 'hello user';
    }
}
