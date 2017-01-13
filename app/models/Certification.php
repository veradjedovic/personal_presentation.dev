<?php

namespace app\models;

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
	public static $columns = array('name', 'authority', 'licence_number', 'certif_url', 'certif_day', 'certif_year', 'status', 'created_at', 'updated_at');
        
        /**
              *
              * @var string 
              */
	public static $id_column = 'id';
        
        /**
               *
               * @var type 
               */
        public $id, $name, $authority, $licence_number, $certif_url, $certif_day, $certif_year, $status, $created_at, $updated_at;
        
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

}
