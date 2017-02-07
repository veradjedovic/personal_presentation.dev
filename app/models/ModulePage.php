<?php

namespace app\models;

use app\models\Model as Model;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;

/**
 * Class ModulePage
 *
 * @author Vera
 */
class ModulePage extends Model
{
    /**
     *
     * @var string
     */
    public static $table = 'module_pages';
    
    /**
     *
     * @var array
     */
    public static $columns = array('page_id', 'module_id', 'priority');
    
    /**
     *
     * @var string
     */
    public static $id_column = 'id';
    
    /**
     *
     * @var type 
     */
    public $id, $page_id, $module_id, $priority;  
    
    /**
     * 
     * @return array
     * @throws PagesNotFoundException
     */
    public function GetAdminPages()
    {
        $fields = "pages.name, pages.route, pages.icon";
        $query = "LEFT JOIN pages ON " . static::$table . ".page_id = pages.id
                    LEFT JOIN modules ON " . static::$table . ".module_id = modules.id
                    WHERE modules.status = " . MODULE_VISIBLE . "
                    AND pages.status = " . ADMIN_VISIBLE . "
                    AND pages.parent_id = 0
                    ORDER BY " . static::$table . ".priority";
        
        $pages = $this->GetAll($fields, $query);
        
        if(!$pages) {

                throw new PagesNotFoundException('Nije pronadjena ni jedna stranica u admin delu.');
        }
        
        return $pages;
    } 
}
