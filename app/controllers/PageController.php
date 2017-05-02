<?php

namespace app\controllers;

use app\controllers\Controller as Controller;
use app\models\Page as Page;
use Exception;
use app\exceptions\PagesNotFoundException as PagesNotFoundException;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\models\ModulePage as ModulePage;
use app\controllers\MenuController as MenuController;
use app\controllers\FooterMenuController as FooterMenuController;
use app\controllers\SidebarController as SidebarController;
use app\factories\LoadObjectFactory as Factory;

/**
 * Description of PageController
 *
 * @author Vera
 */
class PageController extends Controller
{
        /**
         *
         * @var string
         */
	public $layout = 'lifestyle';

        /**
         *
         * @var object
         */
        public $page;

        /**
         *
         * @var object
         */
        public $modulePage;

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
        public function __construct( Page $page, ModulePage $modulePage, MenuController $menuModule, FooterMenuController $footerNav, FooterMenuController $footerLink, SidebarController $sidebar )
        {
            $this->page = $page;
            $this->modulePage = $modulePage;
            $this->menuModule = $menuModule;
            $this->footerNav = $footerNav;
            $this->footerLink = $footerLink;
            $this->sidebar = $sidebar;
        }

        /**
         * Index method
         */
        public function index($id = 1)
        {
                try {

                    $page = $this->page->GetById((isset($id) && is_numeric($id)) ? $id : 1);
                    $modules= $this->modulePage->GetVisibleModulesOfPage($page->id);
                    $modulesOfPage = $this->putObjectsIntoArray($modules);

                    $this->view('index', array('page' => $page, 'modulesOfPage' => $modulesOfPage));

                } catch (PagesNotFoundException $e) {

                    echo $e->getMessage();

                } catch (ItemNotFoundException $e) {

                    header('Location: /');

                } catch (CollectionNotFoundException $e) {

                    echo $e->getMessage();

                } catch (Exception $e) {

                    echo 'Not found';
                }
        }

        /**
         * @param $modules
         * @return array|string
         */
        protected function putObjectsIntoArray($modules)
        {
            foreach ($modules as $module) {
                if ($module->name == 'mod_blank') {

                    $modulesOfPage = 'mod_blank';
                } else {

                    $modulesOfPage[] = Factory::GetObject("app\\controllers\\webModuleControllers\\" . $module->name . "ModuleController");
                }
            }
            return $modulesOfPage;
        }
}