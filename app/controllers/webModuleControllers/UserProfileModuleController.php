<?php

namespace app\controllers\webModuleControllers;

use app\controllers\Controller as Controller;
use app\exceptions\ProfileNotFoundException as ProfileNotFoundException;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use Exception;

/**
 * Description of UserProfileModuleController
 *
 * @author Vera
 */
class UserProfileModuleController extends Controller
{
    /**
     *
     * @var string
     */
    public $layout = '';
    
    /**
     *
     * @var object
     */
    protected $userProfile;


    /**
     * Construct
     */
    public function __construct()
    {
        $this->userProfile = Factory::GetObject('app\models\UserProfile');
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
        
            $userProfile = $this->userProfile->GetFirstProfile();

            $this->view('modules/mod_embedded/UserProfile/user', ['userProfile' => $userProfile]);
            
        } catch (ProfileNotFoundException $ex) {

            $this->view('modules/mod_embedded/UserProfile/user', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {

            $this->view('modules/mod_embedded/UserProfile/user', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/UserProfile/user', ['messageException' => 'Linkovi nisu pronadjeni']);
        }
    }
}
