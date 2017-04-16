<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\factories\LoadObjectFactory as Factory;


/**
 * Description of AdminController
 *
 * @author Vera
 */
class AdminController extends Controller
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
     *
     * @var object
     */
    protected $userDetails;
    

    /**
     * Construct
     */
    public function __construct() 
    {
        $this->userDetails = Factory::GetObject('app\controllers\adminControllers\AdminUserDetailsController');
        $this->menuModule = Factory::GetObject('app\controllers\adminControllers\AdminMenuController');
    }
}