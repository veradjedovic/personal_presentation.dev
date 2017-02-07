<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use app\models\Experience as Experience;
use app\models\Country as Country;
use app\classes\Datetime as Datetime;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\ValidatorException as ValidatorException;
use Exception as Exception;

/**
 * Description of AdminExperienceController
 *
 * @author Vera
 */
class AdminExperienceController extends Controller
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
    protected $experience;
    
    /**
     *
     * @var object
     */
    protected $country;
    
    /**
     *
     * @var object
     */
    protected $datetime;


    /**
     * Construct
     */
    public function __construct() 
    {
        $this->menuModule = new AdminMenuController();
        $this->experience = new Experience();
        $this->country = new Country();
        $this->datetime = new Datetime(date('Y')-50, date('Y'));
    }
    
   /**
     * Index method
     */
    public function index()
    {
        try {
            
            $experience = $this->experience->GetAllExperience();       
            
            $this->view('modules/mod_embedded/mod_experience/admin/index', ['experience' => $experience]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_experience/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_experience/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $countries = $this->country->GetAll();
            $year_begin = $this->datetime->getYearBegin();
            $year_end = $this->datetime->getYearEnd();
            $month = $this->datetime->getMonth();
            
            $this->view('modules/mod_embedded/mod_experience/admin/addNew', ['year_begin' => $year_begin, 'year_end' => $year_end, 'month' => $month, 'countries' => $countries]);
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_experience/admin/addNew', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        try {

            $this->experience->InsertExperience();
            
            return json_encode(['message' => 'Experience successful inserted', 'error' => false]);
        
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (InsertNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        }  catch (Exception $ex) {
            
            return json_encode(['message' => 'Not found', 'error'=> true]);
        }
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {
            
            $experience = $this->experience->GetById(isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '');
            $countries = $this->country->GetAll();
            $year_begin = $this->datetime->getYearBegin();
            $year_end = $this->datetime->getYearEnd();
            $month = $this->datetime->getMonth();
            
            $this->view('modules/mod_embedded/mod_experience/admin/edit', ['experience' => $experience, 'year_begin' => $year_begin, 'year_end' => $year_end, 'month' => $month, 'countries' => $countries]);
        
        } catch (ItemNotFoundException $ex) {           
            
            $this->view('modules/mod_embedded/mod_experience/admin/edit', ['messageException' => $ex->getMessage()]);

        } catch (CollectionNotFoundException $ex) {           
            
            $this->view('modules/mod_embedded/mod_experience/admin/edit', ['messageException' => $ex->getMessage()]);

        }catch (Exception $ex) {           
            
            $this->view('modules/mod_embedded/mod_experience/admin/edit', ['messageException' => 'Nema podataka']);

        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        try {
            
            $this->experience->UpdateExperience(isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Experience successful update', 'error' => false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        }  catch (Exception $ex) {
            
            return json_encode(['message' => 'Not found', 'error'=> true]);
        }
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        echo 'Delete method';
    }
}