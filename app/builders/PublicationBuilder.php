<?php 

namespace app\builders;

use app\models\Publication as Publication;
use app\exceptions\PublicationsNotFoundException as PublicationsNotFoundException;

/**
 * Description of PublicationBuilder
 *
 * @author Vera
 */
class PublicationBuilder 
{   
    /**
        *
        * @var string 
        */
    public $db; 
    
    /**
        *
        * @var object 
        */
    protected $publication;


    /**
        * Construct
        */
    public function __construct() 
    {
        $this->db = Publication::$table;
        $this->publication = new Publication();
    }
    
    /**
        * 
        * @return string
        */
    public function GetVisiblePublications()
    {
        $fields = $this->db . ".title, " . $this->db . ".publisher, " . $this->db . ".publ_month, " . $this->db . ".publ_year, " . $this->db . ".publ_url, " . $this->db . ".description, " . $this->db . ".document_name,
              GROUP_CONCAT(publication_authors.author_name, ' ', publication_authors.author_surname
              SEPARATOR  ', ' ) as author";
        
        $q = "LEFT JOIN publication_authors ON " . $this->db . ".id = publication_authors.publication_id
              WHERE " . $this->db . ".status = " . PUBL_VISIBLE . " AND publication_authors.status = " . PUBL_AUTHOR_VISIBLE . "            
              GROUP BY " . $this->db . ".id
              ORDER BY " . $this->db . ".publ_year DESC";
    
        $publications = $this->publication->GetAll($fields, $q);
            
        if(!$publications) {

            throw new PublicationsNotFoundException('Nije pronadjeno ni jedno izdanje.');
        }

        return $publications;
    }
}
