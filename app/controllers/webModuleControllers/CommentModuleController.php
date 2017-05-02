<?php

namespace app\controllers\webModuleControllers;

use app\controllers\Controller as Controller;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\CommentNotFoundException as CommentNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use app\exceptions\ValidatorException as ValidatorException;
use Exception;

/**
 * Description of CommentModuleController
 *
 * @author Vera
 */
class CommentModuleController extends Controller
{
    /**
     *
     * @var string
     */
    public $layout = '';
    
    /**
     *
     * @var object
     */
    protected $commentContent;

    
    /**
     * Construct
     */
    public function __construct() 
    {
        $this->commentContent = Factory::GetObject('app\models\Comment');
    }

    /**
     *
     * Index method
     */
    public function index()
    {
        try {

            $comments = $this->commentContent->GetVisibleComments((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '');

            $this->view('modules/mod_embedded/Comment/index', ['comments' => $comments]);
            
        } catch (CommentNotFoundException $ex) {

            $this->view('modules/mod_embedded/Comment/show', ['messageException' => $ex->getMessage()]);

        } catch (CollectionNotFoundException $ex) {

            $this->view('modules/mod_embedded/Comment/index', ['messageException' => $ex->getMessage()]);
            
        } catch (Exception $ex) {

            $this->view('modules/mod_embedded/Comment/index', ['messageException' => 'Komentari nisu pronadjeni']);
        }
    }

    /**
     *
     * Insert method
     * @return json
     */
    public function insert($id = '')
    {
        try {
            
            $this->commentContent->InsertData($id);

            return json_encode(['message' => 'Komentar je uspešno prosleđen administratoru sajta i čeka se odobrenje od strane administratora.', 'error' => false]);

        } catch (ValidatorException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);

        } catch (InsertNotExecutedException $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error' => true]);

        } catch (Exception $ex) {

            return json_encode(['message' => 'Neispravan email', 'error' => true]);
        }
    }
}
