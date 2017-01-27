<?php

namespace app\models;

use app\models\Model as Model;
use app\classes\Validator as Validator;
use app\exceptions\ValidatorException as ValidatorException;

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
        $this->validator = new Validator();
    }

    /**
     * 
     * @throws ValidatorException
     */
    public function InsertData() 
    {      
        if(!isset($_POST['tb_subject']) && !isset($_POST['tb_email']) && !isset($_POST['tb_message'])) {       

            throw new ValidatorException('Podaci nisu stigli sa kontakt forme!');
        }    
        
        $this->subject = $this->validator->Required($_POST['tb_subject']);
        $this->email_from = $this->validator->Email($_POST['tb_email']);     
        $this->content = $this->validator->Required($_POST['tb_message']);
        $this->status = MESSAGE_VISIBLE;
        $this->created_at = date('Y-m-d H:i:s');
        $this->Insert();     
    }
    
}
