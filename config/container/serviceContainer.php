<?php

use Orno\Di\Container as Container;
use app\classes\Validator as Validator;
use app\models\Article as Article;
//use app\controllers\adminControllers\AdminArticleController as AdminArticleController;
//use app\controllers\adminControllers\AdminMenuController as AdminMenuController;
//use app\models\Page as Page;


$container = new Container;

$container->add('foo', function() {
    
    $bar = new Validator;    
    return new Article($bar);
});

//$container->add('menuController', function() {
//    
//    $validator = new Validator;
//    $article = new Article($validator);
//    $menuModule = new AdminMenuController();
//    $page = new Page();
//    
//    return new AdminArticleController($menuModule, $article, $page);
//});
//
//$foo = $container->get('foo');
//$menuController = $container->get('menuController');
//
//print_r($menuController);

