<?php

namespace app\models;

use app\models\Model as Model;

/**
 * Class Contact
 *
 * @author Vera
 */
class Contact extends Model
{
    /**
       *
       * @var string
       */
    public static $table = 'messages';
    
    /**
       *
       * @var array 
       */
    public static $columns = array('subject', 'content', 'email_from', 'status', 'created_at');
    
    /**
       *
       * @var string  
       */
    public static $id_column = 'id';
    
    /**
       *
       * @var type 
       */
    public $id, $subject, $content, $email_from, $status, $created_at;
    
}
