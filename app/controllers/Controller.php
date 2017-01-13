<?php 

namespace app\controllers;

abstract class Controller
{
	public $data = array();
	public $view;

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

		echo str_replace('[VIEW]', $contentSite, $content);
	}
}