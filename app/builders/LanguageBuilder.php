<?php 

namespace app\builders;

use app\models\Language as Language;

/**
 * Description of LanguageBuilder
 *
 * @author Vera
 */
class LanguageBuilder 
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
    protected $language;


    /**
        * Construct
        */
    public function __construct() 
    {
        $this->db = Language::$table;
        $this->language = new Language();
    }
    
    /**
        * @return string
        */
    public function GetVisibleLanguages()
    {
        $fields = $this->db . ".name, language_proficiences.name as prof_name";
        $q = " LEFT JOIN language_proficiences 
            ON " . $this->db . ".proficiency_id = language_proficiences.id
            WHERE " . $this->db . ".status = " . LANG_VISIBLE;
 
        $languages = $this->language->GetAll($fields, $q);

            if(!$languages) {

                throw new LanguagesNotFoundException('Nije pronadjena ni jedna informacija o poznavanju jezika.');
            }
        
        return $languages;
    }
}
