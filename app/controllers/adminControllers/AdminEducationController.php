<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use app\models\Education as Education;
use app\classes\Datetime as Datetime;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use Exception as Exception;

/**
 * Description of AdminEducationController
 *
 * @author Vera
 */
class AdminEducationController extends Controller
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
    protected $education;
    
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
        $this->education = new Education();
        $this->datetime = new Datetime(date('Y')-50, date('Y'));
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {

            $education = $this->education->GetAll('*', 'where status = ' . EDUCATION_VISIBLE . ' or status = ' . EDUCATION_NOT_VISIBLE . ' ORDER BY year_from DESC');
            
            $this->view('modules/mod_embedded/mod_education/admin/index', ['education' => $education]);
        
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_education/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_education/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {
            
            $year_begin = $this->datetime->getYearBegin();
            $year_end = $this->datetime->getYearEnd();

            $this->view('modules/mod_embedded/mod_education/admin/addNew', ['year_begin' => $year_begin, 'year_end' => $year_end]);
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_education/admin/addNew', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        try {
            
            $this->education->InsertEducation();
            
            return json_encode(['message' => 'Education successful inserted', 'error'=> false]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (InsertNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Not inserted', 'error'=> true]);
        }
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {

            $education = $this->education->GetById(isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '');
            $year_begin = $this->datetime->getYearBegin();
            $year_end = $this->datetime->getYearEnd();
            
            $this->view('modules/mod_embedded/mod_education/admin/edit', ['education' => $education, 'year_begin' => $year_begin, 'year_end' => $year_end]);
        
        } catch (ItemNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_education/admin/edit', ['messageException' => $ex->getMessage()]);
            
        }catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_education/admin/edit', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        try {
            
            $this->education->UpdateEducation(isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Education successful update', 'error' => false]);
            
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