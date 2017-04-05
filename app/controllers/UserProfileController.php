<?php

namespace app\controllers;

use app\models\UserProfile as UserProfile;
use app\exceptions\ProfileNotFoundException as ProfileNotFoundException;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use Exception;

/**
 * Description of UserProfileController
 *
 * @author Vera
 */
class UserProfileController extends Controller
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

            $this->view('modules/mod_embedded/mod_user_profile/user', ['userProfile' => $userProfile]);
            
        } catch (ProfileNotFoundException $ex) {

            $this->view('modules/mod_embedded/mod_user_profile/user', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {

            $this->view('modules/mod_embedded/mod_user_profile/user', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_user_profile/user', ['messageException' => 'Linkovi nisu pronadjeni']);
        }
    }
}
