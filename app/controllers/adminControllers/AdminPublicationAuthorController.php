<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\models\Publication as Publication;
use app\models\PublicationAuthor as PublicationAuthor;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\PublicationAuthorsNotFoundException as PublicationAuthorsNotFoundException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use Exception as Exception;

/**
 * Description of AdminPublicationAuthorController
 *
 * @author Vera
 */
class AdminPublicationAuthorController extends AdminController
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
    protected $author;


    /**
     * Construct
     */
    public function __construct( Publication $publication, PublicationAuthor $author ) 
    {
        parent::__construct();

        $this->publication = $publication;
        $this->author = $author;
    }
    
   /**
     * Index method
     */
    public function index()
    {
        try {

            $publication = $this->publication->GetById((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');
            $authors = $this->author->GetAllVisibleAuthors($publication->id);
            
            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthors', ['publication_id' => $publication->id, 'authors' => $authors]);
        
        } catch (ItemNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMembers', ['messageException' => $ex->getMessage()]);
            
        } catch (PublicationAuthorsNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMembers', ['messageException' => $ex->getMessage()]);
            
        } catch (CollectionNotFoundException $ex) {
            
            $this->view('modules/mod_embedded/mod_projects/admin/editProjectMembers', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthors', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Insert method
     */
    public function insert()
    {
        try {

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthors');

        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthors', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * 
     * Store method
     * @return json
     * @throws ValidatorException
     */
    public function store()
    {
        try {
            
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_surname'])) {
                
                throw new ValidatorException('Data are not exist');
            }
            
            $publ_id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '';
            $author_id = $this->author->InsertPublicationAuthor($_POST['tb_name'], $_POST['tb_surname'], $publ_id);
            $author = $this->author->GetById($author_id ? $author_id : '');
            
            return json_encode(['message' => 'Author successful insert', 'error' => false, 'author' => $author]);
            
        } catch (ItemNotFoundException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (InsertNotExecutedException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        } catch (ValidatorException $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        }  catch (Exception $ex) {
            
            return json_encode(['message' => 'Not inserted', 'error'=> true]);
        }
    }
    
    /**
     * Show method
     */
    public function show()
    {
        try {

            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthors');
        
        } catch (Exception $ex) {
            
            $this->view('modules/mod_embedded/mod_publications/admin/editPublicationAuthors', ['messageException' => 'Nema podataka']);
        }
    }
    
    /**
     * Update method
     */
    public function update()
    {
        echo 'Update method';
    }
    
    /**
     * Destroy method
     */
    public function destroy()
    {
        echo 'Delete method';
    }
}