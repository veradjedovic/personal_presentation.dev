<?php

namespace app\controllers;

use app\exceptions\ArticleNotFoundException as ArticleNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\ProfileNotFoundException as ProfileNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use Exception;
use app\controllers\Controller as Controller;
use app\controllers\MenuController as MenuController;
use app\controllers\FooterMenuController as FooterMenuController;
use app\controllers\SidebarController as SidebarController;
use app\models\Article as Article;
use app\models\UserProfile as UserProfile;
use app\models\Comment as Comment;
use app\controllers\webModuleControllers\CommentModuleController as CommentModuleController;

/**
 * Description of ArticleController
 *
 * @author Vera
 */
class ArticleController extends Controller
{
    /**
     *
     * @var object
     */
    public $layout = 'lifestyle';

    /**
     *
     * @var object
     */
    protected $article;

    /**
     * @var object
     */
    protected $comment;

    /**
     * @var object
     */
    protected $userProfile;

    /**
     *
     * @var object
     */
    protected $menuModule;

    /**
     *
     * @var object
     */
    protected $footerNav;

    /**
     *
     * @var object
     */
    protected $footerLink;

    /**
     *
     * @var object
     */
    protected $sidebar;

    /**
     * Construct
     */
    public function __construct( Article $article, MenuController $menuModule, FooterMenuController $footerNav, FooterMenuController $footerLink, SidebarController $sidebar,  UserProfile $userProfile, CommentModuleController $comment )
    {
        $this->article = $article;
        $this->userProfile = $userProfile;
        $this->menuModule = $menuModule;
        $this->footerNav = $footerNav;
        $this->footerLink = $footerLink;
        $this->sidebar = $sidebar;
        $this->comment = $comment;
    }

    /**
     * @param $id
     */
    public function show($id)
    {

        try {
            $this->layout = 'lifestyle';
            $article = $this->article->GetById((isset($id) && is_numeric($id)) ? $id : '');
            $userProfile = $this->userProfile->GetUserProfile($article->author_id ? $article->author_id : '');

            $this->view('modules/mod_embedded/Article/show', ['article' => $article, 'userProfile' => $userProfile]);

        } catch (ItemNotFoundException $ex) {

            $this->view('modules/mod_embedded/Article/show', ['messageException' => $ex->getMessage()]);

        } catch (ProfileNotFoundException $ex) {

            $this->view('modules/mod_embedded/Article/show', ['messageException' => $ex->getMessage()]);

        } catch (ArticleNotFoundException $ex) {

            $this->view('modules/mod_embedded/Article/show', ['messageException' => $ex->getMessage()]);

        } catch (CollectionNotFoundException $ex) {

            $this->view('modules/mod_embedded/Article/show', ['messageException' => $ex->getMessage()]);

        } catch (Exception $ex) {

            $this->view('modules/mod_embedded/Article/show', ['messageException' => 'Nema podataka']);
        }
    }
}
