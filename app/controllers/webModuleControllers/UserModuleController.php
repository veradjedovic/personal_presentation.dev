<?php

namespace app\controllers\webModuleControllers;

use app\controllers\Controller as Controller;

/**
 * Description of UserModuleController
 *
 * @author Vera
 */
class UserModuleController extends Controller
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
