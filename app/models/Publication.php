<?php

namespace app\models;

use app\models\Model as Model;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\PublicationsNotFoundException as PublicationsNotFoundException;
use app\exceptions\FileUploadException as FileUploadException;

/**
 * Class Publication
 *
 * @author Vera
 */
class Publication extends Model
{
        /**
         *
         * @var string
         */
        public static $table = 'publications';

        /**
         *
         * @var array
         */
        public static $columns = array('title', 'publisher', 'publ_month', 'publ_year', 'description', 'publ_url', 'document_name', 'status', 'created_at', 'updated_at');

        /**
         *
         * @var string
         */
        public static $id_column = 'id';

        /**
         *
         * @var type 
         */
        public $id, $title, $publisher, $publ_month, $publ_year, $description, $publ_url, $document_name, $status, $created_at, $updated_at;

        /**
         *
         * @var object
         */
        protected $validator;


        /**
         * Construct
         */
        public function __construct() 
        {
            $this->validator = Factory::GetObject('app\classes\Validator');
        }

        /**
         * 
         * @return array
         * @throws PublicationsNotFoundException
         */
        public function GetVisiblePublications()
        {
            $fields = static::$table . ".title, " . static::$table . ".publisher, " . static::$table . ".publ_month, " . static::$table . ".publ_year, " . static::$table . ".publ_url, " . static::$table . ".description, " . static::$table . ".document_name,
                  GROUP_CONCAT(publication_authors.author_name, ' ', publication_authors.author_surname
                  SEPARATOR  ', ' ) as author";

            $q = "LEFT JOIN publication_authors ON " . static::$table . ".id = publication_authors.publication_id
                  WHERE " . static::$table . ".status = " . PUBL_VISIBLE . " AND publication_authors.status = " . PUBL_AUTHOR_VISIBLE . "            
                  GROUP BY " . static::$table . ".id
                  ORDER BY " . static::$table . ".publ_year DESC";

            $publications = $this->GetAll($fields, $q);

            if(!$publications) {

                throw new PublicationsNotFoundException('Nije pronadjeno ni jedno izdanje.');
            }

            return $publications;
        }
        
        /**
         * 
         * @return array
         * @throws PublicationsNotFoundException
         */
        public function GetAllPublications()
        {
            $fields = static::$table . ".id, " .static::$table . ".title, "  .static::$table . ".publisher, " . static::$table . ".publ_month, " . static::$table . ".publ_year, " . static::$table . ".publ_url, " . static::$table . ".description, " . static::$table . ".document_name, " . static::$table . ".status,
                  GROUP_CONCAT(publication_authors.author_name, ' ', publication_authors.author_surname
                  SEPARATOR  ', ' ) as author";
            

            $q = "LEFT JOIN publication_authors ON " . static::$table . ".id = publication_authors.publication_id
                  WHERE (" . static::$table . ".status = " . PUBL_VISIBLE . " OR " . static::$table . ".status = " . PUBL_NOT_VISIBLE . ") AND publication_authors.status = " . PUBL_AUTHOR_VISIBLE . "            
                  GROUP BY " . static::$table . ".id
                  ORDER BY " . static::$table . ".publ_year DESC";

            $publications = $this->GetAll($fields, $q);

            if(!$publications) {

                throw new PublicationsNotFoundException('Publications not found.');
            }

            return $publications;
        }
    
        /**
         * 
         * @param int $id
         * @param int $status
         * @return object
         */
        protected function SetStatus($id, $status)
        {
        $item = $this->GetById($this->validator->Numeric($id));     
        $item->status = $status;
        $item->Update();

        return $item;
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusVisible($id)
        {
            return $this->SetStatus($id, PUBL_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusNotVisible($id)
        {
            return $this->SetStatus($id, PUBL_NOT_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusDeleted($id)
        {
            return $this->SetStatus($id, PUBL_DELETED);
        }
        
        /**
         * 
         * @return int
         * @throws ValidatorException
         */
        public function InsertPublication() 
        {
            if(!isset($_POST['tb_title']) && !isset($_POST['tb_publisher']) && !isset($_POST['tb_url']) && !isset($_POST['ta_description'])) {
                
                throw new ValidatorException('Data are not exist');
            }

            $this->title = $this->validator->Required($_POST['tb_title']);
            $this->publisher = $this->validator->Required($_POST['tb_publisher']);
            $this->publ_url = !empty(trim($_POST['tb_url'])) ? $this->validator->Url($_POST['tb_url']) : '';
            $this->description = $this->validator->TestInput($_POST['ta_description']);
            $this->publ_year = $this->validator->Required(isset($_POST['tb_year']) ? $_POST['tb_year'] : date('Y'));
            $this->publ_month = $this->validator->Required(isset($_POST['tb_month']) ? $_POST['tb_month'] : 'January');
            $this->status = isset($_POST['tb_status']) ? PUBL_VISIBLE : PUBL_NOT_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->document_name = $this->validator->TestInput($this->UploadPdf());
            $publ_id = $this->Insert();
            
            return $publ_id;
        }
        
        /**
         * 
         * @param int $id
         * @throws ValidatorException
         */
        public function UpdatePublication($id) 
        {
            if(!isset($_POST['tb_title']) && !isset($_POST['tb_publisher']) && !isset($_POST['tb_url']) && !isset($_POST['ta_description'])) {
                
                throw new ValidatorException('Data are not exist');
            }

            $item = $this->GetById($this->validator->Numeric($id));
            $item->title = $this->validator->Required($_POST['tb_title']);
            $item->publisher = $this->validator->Required($_POST['tb_publisher']);
            $item->publ_url = !empty(trim($_POST['tb_url'])) ? $this->validator->Url($_POST['tb_url']) : '';
            $item->description = $this->validator->TestInput($_POST['ta_description']);
            $item->publ_year = $this->validator->Required(isset($_POST['tb_year']) ? $_POST['tb_year'] : date('Y'));
            $item->publ_month = $this->validator->Required(isset($_POST['tb_month']) ? $_POST['tb_month'] : 'January');
            $item->status = isset($_POST['tb_status']) ? PUBL_VISIBLE : PUBL_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');

            $item->Update();
        }
        
        /**
         * 
         * @return string
         * @throws FileUploadException
         */
        protected function UploadPdf()
        {
            if(!isset($_FILES)) {
                
                throw new FileUploadException("File doesn't exists");   
            }
            
            if($_FILES==[] || ($_FILES['f_upload']['size'] == false && $_FILES['f_upload']['type'] == false && $_FILES['f_upload']['error'] == true && $_FILES['f_upload']['name'] == false && $_FILES['f_upload']['tmp_name'] == false)){
                
                $pdf = '';
                
            } else {
                
                if($_FILES['f_upload']['size'] <= 0) {
                    
                    throw new FileUploadException('The picture is too large');                   
                }
                
                if(($_FILES['f_upload']['type'] != "application/pdf")) {
                    
                    throw new FileUploadException('Invalid file format');                   
                }
                
                if ($_FILES['f_upload']['error'] > 0) {
                    
                    throw new FileUploadException('Error is happend');
                }

                $pdf = uniqid() . $_FILES['f_upload']['name'];
                $pdf = str_replace(' ', '_', $pdf);
                move_uploaded_file($_FILES['f_upload']['tmp_name'], APP_PATH. "resources/documents/publications_pdf/" . $pdf);                
            }
            
            return $pdf;
        }
        
        /**
         * 
         * @param int $id
         */
        public function UpdatePublicationPdf($id) 
        {
            $item = $this->GetById($this->validator->Numeric($id));
            $item->document_name = $this->validator->TestInput($this->UploadPdf());
            $item->Update();
        }
}
