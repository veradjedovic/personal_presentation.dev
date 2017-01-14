<?php

//web routes
$collector->get('/', ['app\controllers\PageController','index']);
$collector->get('naslovna', ['app\controllers\PageController','index']);
$collector->get('naslovna/{id}', ['app\controllers\PageController','index']);
$collector->get('aktivnosti/{id}', ['app\controllers\PageController','index']);
$collector->get('vestine/{id}', ['app\controllers\PageController','index']);
$collector->get('kontakt/{id}', ['app\controllers\PageController','index']);
$collector->post('kontakt/{id}', ['app\controllers\ContactController','insert']);

//admin routes
$collector->get('admin', ['app\controllers\AdminController','index']);
$collector->get('admin/{id}', ['app\controllers\AdminController','index']);
