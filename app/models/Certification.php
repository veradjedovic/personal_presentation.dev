<?php

namespace app\models;

use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\CertificationsNotFoundException;
use app\traits\SetStatusTrait as SetStatusTrait;

/**
 * Description of Certification
 *
 * @author Vera
 */
class Certification extends Model
{
    use SetStatusTrait;
    
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
            $this->validator = Factory::GetObject('app\classes\Validator');
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
            $this->certif_url = !empty(trim($_POST['tb_certif_url'])) ? $this->validator->Url($_POST['tb_certif_url']) : '';
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
   
            $item = $this->GetById($this->validator->Numeric($id));
            $item->name = $this->validator->Required($_POST['tb_name']);
            $item->authority = $this->validator->Required($_POST['tb_authority']);
            $item->licence_number = $this->validator->TestInput($_POST['tb_licence_number']);
            $item->certif_url = !empty(trim($_POST['tb_certif_url'])) ? $this->validator->Url($_POST['tb_certif_url']) : '';
            $item->certif_month = $this->validator->Required(isset($_POST['tb_month']) ? $_POST['tb_month'] : 'January');
            $item->certif_year = $this->validator->Required(isset($_POST['tb_year']) ? $_POST['tb_year'] : date('Y'));
            $item->status = isset($_POST['tb_status']) ? CERTIF_VISIBLE : CERTIF_NOT_VISIBLE;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->Update();
        }

}
