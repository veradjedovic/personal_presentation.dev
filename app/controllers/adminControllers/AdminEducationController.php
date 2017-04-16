<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
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
class AdminEducationController extends AdminController
{    
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
    public function __construct( Education $education, Datetime $datetime ) 
    {
        parent::__construct();

        $this->education = $education;
        $this->datetime = $datetime;
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
     * 
     * Store method
     * @return type
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
     * 
     * Update methid
     * @return json
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
     * 
     * Method UpdateStatusVisible
     * @return json
     */
    public function updateStatusVisible()
    {
        try {
            
            $item = $this->education->SetStatusVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', EDUCATION_VISIBLE);
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Education not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * Method UpdateStatusNotVisible
     * @return json
     */
    public function updateStatusNotVisible()
    {
        try {
            
            $item = $this->education->SetStatusNotVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', EDUCATION_NOT_VISIBLE);
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Education not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * Destroy method
     * @return json
     */
    public function destroy()
    {
        try {
            
            $item = $this->education->SetStatusDeleted((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '', EDUCATION_DELETED);
            
            return json_encode(['message' => 'Education deleted', 'id' => $item->id, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Education not found', 'error'=> true]);
        }
    }
}