<?php 

namespace app\builders;

use app\models\ModulePage as ModulePage;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;

/**
 * Description of ModulePageBuilder
 *
 * @author Vera
 */
class ModulePageBuilder 
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
    protected $modulePage;


    /**
        * Construct
        */
    public function __construct() 
    {
        $this->db = ModulePage::$table;
        $this->modulePage = new ModulePage();
    }
    
    /**
        * 
        * @param int $id
        * @return string
        */
    public function GetVisibleModulesOfPage($id)
    {
        $fields = "modules.name";       
        $q = "LEFT JOIN modules
              ON " . $this->db . ".module_id = modules.id
              WHERE page_id = {$id} AND modules.status = " . MODULE_VISIBLE . "
              ORDER BY priority";
 
        $modulesOfPage = $this->modulePage->GetAll($fields, $q);

        if(!$modulesOfPage) {
            
            throw new ItemNotFoundException('Moduli nisu pronadjeni');
        }

	return $modulesOfPage;
    }
}
