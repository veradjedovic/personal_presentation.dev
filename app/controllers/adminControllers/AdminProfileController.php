<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\models\UserProfile as UserProfile;
use app\models\Country as Country;
use app\models\Industry as Industry;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\UpdateNotExecutedExceptionas as UpdateNotExecutedException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
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
    public function __construct() 
    {
        $this->userProfile = new UserProfile();
        $this->country = new Country();
        $this->industry = new Industry();
        $this->menuModule = new AdminMenuController();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $userProfile = $this->userProfile->GetAll('*', 'limit 1')[0];
            $country = $this->country->GetAll();
            $industry = $this->industry->GetAll();

            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['userProfile' => $userProfile, 'country' =>$country, 'industry' => $industry]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $message = $ex->getMessage();
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['messageException' => $message]);
            
        } catch (Exception $ex) {
            
            $message = 'Linkovi nisu pronadjeni';
            
            $this->view('modules/mod_embedded/mod_user_profile/admin/index', ['messageException' => $message]);
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
            
            return json_encode(['message' => 'Successful update']);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Nepostojeci podaci!']);
        }
    }
}