<?php

namespace app\models;

use app\models\Model as Model;

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
}
