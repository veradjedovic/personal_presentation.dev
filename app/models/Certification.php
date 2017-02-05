<?php

namespace app\models;

use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\CertificationsNotFoundException;

/**
 * Description of Certification
 *
 * @author Vera
 */
class Certification extends Model
{
        /**
         *
         * @var string
         */
	public static $table = 'certifications';
        
        /**
         *
         * @var array
         */
	public static $columns = array('name', 'authority', 'licence_number', 'certif_url', 'certif_month', 'certif_year', 'status', 'created_at', 'updated_at');
        
        /**
         *
         * @var string
         */
	public static $id_column = 'id';
        
        /**
         *
         * @var type
         */
        public $id, $name, $authority, $licence_number, $certif_url, $certif_month, $certif_year, $status, $created_at, $updated_at;
        
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
            $this->validator = new Validator();
        }

        /**
         * 
         * @return array
         * @throws CertificationsNotFoundException
         */
        public function GetCertifVisible()
        {
            $certifications = $this->GetAll('*', 'WHERE status =' . CERTIF_VISIBLE . ' ORDER BY certif_year DESC');

            if(!$certifications){
                
                throw new CertificationsNotFoundException('Ova osoba ne poseduje sertifikate.');
            }
            
            return $certifications;
        }
        
        /**
         * 
         * @param int $id
         * @param int $status
         * @return object
         */
        protected function SetStatus($id, $status)
        {
        $item = $this->GetById($id);     
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
            return $this->SetStatus($id, CERTIF_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusNotVisible($id)
        {
            return $this->SetStatus($id, CERTIF_NOT_VISIBLE);
        }
        
        /**
         * 
         * @param int $id
         * @return object
         */
        public function SetStatusDeleted($id)
        {
            return $this->SetStatus($id, CERTIF_DELETED);
        }
        
        /**
         * 
         * @throws ValidatorException
         */
        public function InsertCertification() 
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_authority']) && !isset($_POST['tb_licence_number']) && !isset($_POST['tb_certif_url']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }

            $this->name = $this->validator->Required($_POST['tb_name']);
            $this->authority = $this->validator->Required($_POST['tb_authority']);
            $this->licence_number = $this->validator->TestInput($_POST['tb_licence_number']);
            $this->certif_url = $this->validator->TestInput($_POST['tb_certif_url']);
            $this->certif_month = $this->validator->Required(isset($_POST['tb_month']) ? $_POST['tb_month'] : 'January');
            $this->certif_year = $this->validator->Required(isset($_POST['tb_year']) ? $_POST['tb_year'] : date('Y'));
            $this->status = isset($_POST['tb_status']) ? CERTIF_VISIBLE : CERTIF_NOT_VISIBLE;
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->Insert();
        }
        
        /**
         * 
         * @param int $id
         * @throws ValidatorException
         */
        public function UpdateCertification($id) 
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_authority']) && !isset($_POST['tb_licence_number']) && !isset($_POST['tb_certif_url']) && !isset($_POST['btn_submit'])) {
                
                throw new ValidatorException('Data is not exists');
            }
   
            $item = $this->GetById($id);
            $item->name = $this->validator->Required($_POST['tb_name']);
            $item->authority = $this->validator->Required($_POST['tb_authority']);
            $item->licence_number = $this->validator->TestInput($_POST['tb_licence_number']);
            $item->certif_url = $this->validator->TestInput($_POST['tb_certif_url']);
            $item->certif_month = $this->validator->Required(isset($_POST['tb_month']) ? $_POST['tb_month'] : 'January');
            $item->certif_year = $this->validator->Required(isset($_POST['tb_year']) ? $_POST['tb_year'] : date('Y'));
            $item->status = isset($_POST['tb_status']) ? CERTIF_VISIBLE : CERTIF_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->Update();
        }

}
