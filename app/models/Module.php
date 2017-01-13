<?php

namespace app\models;

use app\models\Model as Model;

/**
 * Class Module
 *
 * @author Vera
 */
class Module extends Model
{
    /**
       *
       * @var string
       */
    public static $table = 'modules';
    
    /**
       *
       * @var array 
       */
    public static $columns = array('name', 'status', 'created_at', 'updated_at');
    
    /**
       *
       * @var string  
       */
    public static $id_column = 'id';
    
    /**
       *
       * @var type 
       */
    public $id, $name, $status, $created_at, $updated_at;
    
}
