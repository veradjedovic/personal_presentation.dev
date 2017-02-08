<?php 

namespace app\controllers\adminControllers;

use app\controllers\Controller as Controller;
use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
use app\models\Language as Language;
use app\models\LanguageProficiency as LanguageProficiency;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use app\exceptions\ValidatorException as ValidatorException;
use Exception as Exception;

/**
 * Description of AdminLanguageController
 *
 * @author Vera
 */
class AdminLanguageController extends Controller
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
    protected $language;
    
    /**
     *
     * @var object
     */
    protected $proficiency;


    /**
     * Construct
     */
    public function __construct() 
    {
        $this->menuModule = new AdminMenuController();
        $this->language = new Language();
        $this->proficiency = new LanguageProficiency();
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $languages = $this->language->GetAllLanguages();
            
            $this->view('modules/mod_embedded/mod_languages/admin/index', ['languages' => $languages]);
        
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_experience/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_languages/admin/index', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $proficiences = $this->proficiency->GetAll();
            
            $this->view('modules/mod_embedded/mod_languages/admin/addNew', ['proficiences' => $proficiences]);
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_languages/admin/addNew', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Store method
     */
    public function store()
    {
        try {
            
            $this->language->InsertLanguage();
            
            return json_encode(['message' => 'Language successful insert', 'error' => false]);
            
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

            $language = $this->language->GetById(isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '');
            $proficiences = $this->proficiency->GetAll();
            
            $this->view('modules/mod_embedded/mod_languages/admin/edit', ['language' => $language, 'proficiences' => $proficiences]);
        
        } catch (ItemNotFoundException $ex) {
                    
            $this->view('modules/mod_embedded/mod_languages/admin/edit', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
                    
            $this->view('modules/mod_embedded/mod_languages/admin/edit', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
                    
            $this->view('modules/mod_embedded/mod_languages/admin/edit', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        try {
            
            $this->language->UpdateLanguage(isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '');

            return json_encode(['message' => 'Language successful update', 'error' => false]);
            
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