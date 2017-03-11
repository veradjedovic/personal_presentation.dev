<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\UserProfile as UserProfile;
use app\models\Country as Country;
use app\models\Industry as Industry;
use app\classes\Session as Session;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\FileUploadException as FileUploadException;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use app\exceptions\ProfileNotFoundException as ProfileNotFoundException;
use Exception as Exception;

/**
 * Description of AdminProfileController
 *
 * @author Vera
 */
class AdminProfileController extends Controller
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
    protected $userProfile;
    
    /**
     *
     * @var object
     */
    protected $country;
    
    /**
     *
     * @var object
     */
    protected $industry;
    
    /**
     *
     * @var object
     */
    protected $menuModule;
    

    /**
     * Construct
     */
    public function __construct( UserProfile $userProfile, Country $country, Industry $industry, AdminMenuController $menuModule ) 
    {
        $this->userProfile = $userProfile;
        $this->country = $country;
        $this->industry = $industry;
        $this->menuModule = $menuModule;
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $userProfile = $this->userProfile->GetUserProfile(Session::get('id') ? Session::get('id') : '');
            $country = $this->country->GetAll();
            $industry = $this->industry->GetAll();

            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['userProfile' => $userProfile, 'country' =>$country, 'industry' => $industry]);
            
        } catch (ProfileNotFoundException $ex) {

            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {

            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['messageException' => 'Linkovi nisu pronadjeni']);
        }
    }
    
    /**
     * 
     * Update method
     * @return json
     */
    public function update()
    {
        try {
            
            $this->userProfile->UpdateUser();
            
            return json_encode(['message' => 'Successful update', 'error' => false]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Data not found!', 'error' => true]);
        }
    }
    
    /**
     * 
     * UpdateProfilePicture method
     * @return json
     */
    public function updateProfilePicture()
    {
        try {
            
            $this->userProfile->UpdateProfilePicture((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Successful edit profile picture', 'error' => false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (FileUploadException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Data not found!', 'error' => true]);
        }
        
    }
}