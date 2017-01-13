<?php

namespace app\models;

use app\models\Model as Model;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;

/**
 * Class Page
 *
 * @author Vera
 */
class Page extends Model
{
    /**
       *
       * @var string
       */
    public static $table = 'pages';
    
    /**
       *
       * @var array 
       */
    public static $columns = array('name', 'name_controller', 'name_method', 'route', 'template', 'menu', 'footer', 'status', 'created_at', 'updated_at');
    
    /**
       *
       * @var string  
       */
    public static $id_column = 'id';
    
    /**
       *
       * @var type 
       */
    public $id, $name, $name_controller, $name_method, $route, $template, $menu, $footer, $status, $created_at, $updated_at;
    
    /**
       * Get web pages with visible status
       */
    public function GetWebPages()
    {
        $pages = $this->GetAll('*', 'where status =' . WEB_VISIBLE);
        
        if (!$pages) {
            throw new PagesNotFoundException('Pages not found');
        }
        
        return $pages;
    }
    
}
