<?php 

namespace app\controllers\adminControllers;

use app\controllers\adminControllers\AdminController as AdminController;
use app\models\Comment as Comment;
use app\models\Article as Article;
use app\exceptions\ContactNotFoundException as ContactNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\ValidatorException as ValidatorException;
use app\exceptions\CommentNotFoundException as CommentNotFoundException;
use Exception as Exception;

/**
 * Description of AdminCommentController
 *
 * @author Vera
 */
class AdminCommentController extends AdminController
{
    /**
     *
     * @var object
     */
    protected $commentObject;

    /**
     * @var object
     */
    protected $article;


    /**
     * Construct
     */
    public function __construct( Comment $commentObject, Article $article )
    {
        parent::__construct();

        $this->commentObject = $commentObject;
        $this->article = $article;
    }

    /**
     * Index method
     */
    public function index()
    {
        try{

            $comments = $this->commentObject->GetAvailebleAndUnavailableComments();

            $this->view('modules/mod_embedded/Comment/admin/index', ['comments' => $comments]);

        } catch (CommentNotFoundException $ex) {

            $this->view('modules/mod_embedded/Comment/admin/index', ['messageException' => $ex->getMessage()]);

        } catch (CollectionNotFoundException $ex) {

            $this->view('modules/mod_embedded/Comment/admin/index', ['messageException' => $ex->getMessage()]);

        } catch (Exception $ex) {

            $this->view('modules/mod_embedded/Comment/admin/index', ['messageException' => 'No comments']);
        }
    }

    
    /**
     * Show method
     */
    public function show($id = '')
    {
        try{

            $comment = $this->commentObject->GetById($id);

            $this->view('modules/mod_embedded/Comment/admin/show', ['comment' => $comment]);

        } catch (ItemNotFoundException $ex) {

            $this->view('modules/mod_embedded/Comment/admin/show', ['messageException' => $ex->getMessage()]);

        } catch (Exception $ex) {

            $message = 'Data not found!';

            $this->view('modules/mod_embedded/Comment/admin/show', ['messageException' => $message]);
        }
    }

    /**
     *
     * Update method
     * @return json
     */
    public function update($id = '')
    {
        try {

            $this->commentObject->UpdateComment($id);

            return json_encode(['message' => 'Successful update', 'error' => false]);

        } catch (ValidatorException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);

        } catch (ItemNotFoundException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);

        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);

        } catch (Exception $ex) {

            return json_encode(['message' => 'Data not found!', 'error' => true]);
        }
    }

    /**
     * @param int/string $id
     */
    public function readComment($id = '')
    {
        try{

            $comment = $this->commentObject->GetById($id);

            $this->view('modules/mod_embedded/Comment/admin/readComment', ['comment' => $comment]);

        } catch (ItemNotFoundException $ex) {

            $this->view('modules/mod_embedded/Comment/admin/readComment', ['messageException' => $ex->getMessage()]);

        } catch (Exception $ex) {

            $message = 'Data not found!';

            $this->view('modules/mod_embedded/Comment/admin/readComment', ['messageException' => $message]);
        }
    }

    /**
     *
     * Method UpdateStatusVisible
     * @return json
     */
    public function updateStatusVisible($id = '')
    {
        try {

            $item = $this->commentObject->SetStatusVisible($id, COMMENT_APPROVED);

            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);

        } catch (ItemNotFoundException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (ValidatorException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (Exception $ex) {

            return json_encode(['message' => 'Comment not found', 'error'=> true]);
        }
    }

    /**
     *
     * Method UpdateStatusNotVisible
     * @return json
     */
    public function updateStatusNotVisible($id = '')
    {
        try {

            $item = $this->commentObject->SetStatusNotVisible($id, COMMENT_UNAPPROVED);

            return json_encode(['message' => 'Status updated', 'id' => $item->id, 'status' => $item->status, 'error'=> false]);

        } catch (ItemNotFoundException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (ValidatorException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (Exception $ex) {

            return json_encode(['message' => 'Comment not found', 'error'=> true]);
        }
    }
    
    /**
     * Destroy method
     */
    public function destroy($id='')
    {
        try {

            $item = $this->commentObject->SetStatusDeleted($id, COMMENT_DELETED);

            return json_encode(['message' => 'Comment deleted', 'id' => $item->id, 'error'=> false]);

        } catch (ItemNotFoundException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (UpdateNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (ValidatorException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);

        } catch (Exception $ex) {

            return json_encode(['message' => 'Comment not found', 'error'=> true]);
        }
    }
}