<?php 

namespace app\controllers;

abstract class Controller
{
        /**
         *
         * @var array 
         */
	public $data = array();
        
        /**
         *
         * @var string 
         */
	public $view;
        
        /**
         * 
         * @param  string $view
         * @param array $data
         */
	public function view($view = "index", $data = null)
	{
		$this->view = $view;
		$content = '[VIEW]';

		if($this->layout){
			ob_start();
				include APP_PATH . "templates/{$this->layout}/index.php";
			$content = ob_get_clean();			
		}

		ob_start();
			include APP_PATH . "views/{$view}.php";
		$contentSite = ob_get_clean();             
                    
                    ob_start();
                            echo (isset($this->menuModule)) ? $this->menuModule->index() : '';
                    $contentMenu = ob_get_clean(); 
                    
                    ob_start();
                            echo (isset($this->userDetails)) ? $this->userDetails->index() : '';
                    $contentUserDetails = ob_get_clean(); 
                    
                    ob_start();
                            echo (isset($this->footerNav)) ? $this->footerNav->index() : '';
                    $contentFooterNav = ob_get_clean();
                    
                    ob_start();
                            echo (isset($this->footerLink)) ? $this->footerLink->linkToWebSites() : '';
                    $contentFooterLink = ob_get_clean();
                    
                    ob_start();
                            echo (isset($this->sidebar)) ? $this->sidebar->index() : '';
                    $contentSidebar = ob_get_clean();
                
		$page = str_replace('[VIEW]', $contentSite, $content);
                $page = str_replace('[MENU]', $contentMenu, $page);
                $page = str_replace('[USERDETAILS]', $contentUserDetails, $page);
                $page = str_replace('[FOOTERMENU]', $contentFooterNav, $page);
                $page = str_replace('[FOOTERLINKS]', $contentFooterLink, $page);
                $page = str_replace('[SIDEBAR]', $contentSidebar, $page);
                
                echo $page;
	}
        
        /**
         * 
         * @param string $view
         * @param array $data
         */
//	public function menuView($view = "index", $data = null)
//	{
//		$this->view = $view;
//		$content = '[MENU]';
//
//		if($this->layout){
//			ob_start();
//				include APP_PATH . "templates/{$this->layout}/index.php";
//			$content = ob_get_clean();			
//		}
//
//		ob_start();
//			include APP_PATH . "views/{$view}.php";
//		$contentSite = ob_get_clean();
//
//		echo str_replace('[MENU]', $contentSite, $content);
//	}
}