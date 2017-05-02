<?php

namespace app\models;

use app\models\Model as Model;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\CommentNotFoundException as CommentNotFoundException;
use app\traits\SetStatusTrait as SetStatusTrait;

/**
 * Class Comment
 *
 * @author Vera
 */
class Comment extends Model
{
    use SetStatusTrait;

    /**
     *
     * @var string
     */
    public static $table = 'comments';
    
    /**
     *
     * @var array
     */
    public static $columns = array('name', 'email', 'content', 'article_id', 'status', 'created_at', 'updated_at');
    
    /**
     *
     * @var string
     */
    public static $id_column = 'id';
    
    /**
     *
     * @var type 
     */
    public $id, $name, $email, $content, $article_id, $status, $created_at, $updated_at;
    
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
        $this->validator = Factory::GetObject('app\classes\Validator');
    }

    /**
     * 
     * @throws ValidatorException
     */
    public function InsertData($id)
    {      
        if(!isset($_POST['tb_name']) && !isset($_POST['tb_email']) && !isset($_POST['tb_content'])) {

            throw new ValidatorException('Podaci nisu stigli sa kontakt forme!');
        }

        $this->name = $this->validator->Required($_POST['tb_name']);
        $this->email = $this->validator->Email($_POST['tb_email']);
        $this->content = $this->validator->Required($_POST['tb_content']);
        $this->article_id = $this->validator->Numeric($id);
        $this->status = COMMENT_UNAPPROVED;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        $this->Insert();
    }

    /**
     *
     * @return array
     * @throws CommentNotFoundException
     */
    public function GetVisibleComments($id)
    {
        $comments = $this->GetAll('*', ' WHERE status =' . COMMENT_APPROVED . ' AND article_id =' . $id . ' ORDER BY created_at DESC');

        if(!$comments) {

            throw new CommentNotFoundException('Nema komentara.');
        }
        
        return $comments;
    }

    /**
     * @return array
     * @throws CommentNotFoundException
     */
    public function GetAvailebleAndUnavailableComments()
    {
        $fields = static::$table . '.id, '
            . static::$table . '.name, '
            . static::$table . '.email, '
            . static::$table . '.content, '
            . static::$table . '.status, '
            . static::$table . '.created_at, 
            articles.title as article';

        $query = "LEFT JOIN articles ON " . static::$table . ".article_id = articles.id
                     WHERE " . static::$table . ".status = " . COMMENT_APPROVED . "
                     OR " . static::$table . ".status = " . COMMENT_UNAPPROVED . " ORDER BY " . static::$table . ".created_at DESC";

        $comments = $this->GetAll($fields, $query);

        if(!$comments) {

            throw new CommentNotFoundException('No comments');
        }

        return $comments;
    }

    /**
     *
     * @param int $id
     * @throws ValidatorException
     */
    public function UpdateComment($id)
    {
        if(!isset($_POST['ta_content'])) {

            throw new ValidatorException('Data not found!');
        }

        $item = $this->GetById($this->validator->Numeric($id));
        $item->content = $this->validator->Required($_POST['ta_content']);
        $item->status = isset($_POST['tb_status']) ? COMMENT_APPROVED : COMMENT_UNAPPROVED;
        $item->updated_at = date('Y-m-d H:i:s');
        $item->Update();
    }
}
