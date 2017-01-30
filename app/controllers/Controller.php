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
                
		$page = str_replace('[VIEW]', $contentSite, $content);
                $page = str_replace('[MENU]', $contentMenu, $page);
                
                echo $page;
	}
        
        /**
         * 
         * @param string $view
         * @param array $data
         */
	public function menuView($view = "index", $data = null)
	{
		$this->view = $view;
		$content = '[MENU]';

		if($this->layout){
			ob_start();
				include APP_PATH . "templates/{$this->layout}/index.php";
			$content = ob_get_clean();			
		}

		ob_start();
			include APP_PATH . "views/{$view}.php";
		$contentSite = ob_get_clean();

		echo str_replace('[MENU]', $contentSite, $content);
	}
}