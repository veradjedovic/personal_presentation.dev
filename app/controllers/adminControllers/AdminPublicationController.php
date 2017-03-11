<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\models\Publication as Publication;
use app\models\PublicationAuthor as PublicationAuthor;
use app\classes\Datetime as Datetime;
use app\classes\Session as Session;
use app\exceptions\PublicationsNotFoundException as PublicationsNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\FileUploadException as FileUploadException;
use Exception as Exception;

/**
 * Description of AdminPublicationController
 *
 * @author Vera
 */
class AdminPublicationController extends AdminController
{
    /**
     *
     * @var object
     */
    protected $publication;
    
    /**
     *
     * @var object
     */
    protected $publicationAuthor;

    /**
     *
     * @var object
     */
    protected $datetime;


    /**
     * Construct
     */
    public function __construct( Publication $publication, PublicationAuthor $publicationAuthor, Datetime $datetime ) 
    {
        parent::__construct();

        $this->publication = $publication;
        $this->publicationAuthor = $publicationAuthor;
        $this->datetime = $datetime;
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $publications = $this->publication->GetAllPublications();

            $this->view('modules/mod_embedded/mod_publications/admin/index', ['publications' => $publications]);
        
        } catch (PublicationsNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/index', ['messageException' => 'Nema podataka']);
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
            $months = $this->datetime->getMonth();
            
            $this->view('modules/mod_embedded/mod_publications/admin/addNew', ['year_begin' => $year_begin, 'year_end' => $year_end, 'months' => $months]);
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/addNew', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * 
     * Store method
     * @return json
     */
    public function store()
    {
        try {
            
            $publ_id = $this->publication->InsertPublication();
            $this->publicationAuthor->InsertPublicationAuthor((Session::get('name') ? Session::get('name') : ''), (Session::get('surname') ? Session::get('surname') : ''), $publ_id);           
            
            return json_encode(['message' => 'Successful inserted', 'error' => false]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (FileUploadException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (InsertNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => "Error is happend, data  aren't inserted!", 'error' => true]);
        }
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {

            $publication = $this->publication->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            $year_begin = $this->datetime->getYearBegin();
            $year_end = $this->datetime->getYearEnd();
            $months = $this->datetime->getMonth();
            
            $this->view('modules/mod_embedded/mod_publications/admin/edit', ['publication' => $publication, 'year_begin' => $year_begin, 'year_end' => $year_end, 'months' => $months]);
        
        } catch (ItemNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/edit', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/edit', ['messageException' => 'Nema podataka']);
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
            
            $this->publication->UpdatePublication((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Publication successful update', 'error' => false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Not found', 'error'=> true]);
        }
    }
    
    /**
     * 
     * UploadPublicationPicture method.
     * @return json
     */
    public function uploadPublicationPdf() 
    {
        try {
            
            $this->publication->UpdatePublicationPdf((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Successful edit publication document', 'error' => false]);
            
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
    
    /**
     * 
     * Method UpdateStatusVisible
     * @return json
     */
    public function updateStatusVisible()
    {
        try {
            
            $item = $this->publication->SetStatusVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Publication not found', 'error'=> true]);
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
            
            $item = $this->publication->SetStatusNotVisible((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Publication not found', 'error'=> true]);
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
            
            $item = $this->publication->SetStatusDeleted((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            
            return json_encode(['message' => 'Publication deleted', 'id' => $item->id, 'error'=> false]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (UpdateNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Publication not found', 'error'=> true]);
        }
    }
}