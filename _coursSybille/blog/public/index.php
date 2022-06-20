<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Blog\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "ArticleController@index");
$router->get('/login/', "UserController@showLogin");
$router->get('/register/', "UserController@showRegister");
$router->get('/logout/', "UserController@logout");
$router->get('/dashboard/', "ArticleController@showAll");
$router->get('/dashboard/nouveau/', "ArticleController@create");
$router->get('/dashboard/:article/delete/', "ArticleController@delete");
$router->get('/article/:article/', "ArticleController@show");

$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
$router->post('/dashboard/nouveau/', "ArticleController@store");
$router->post('/article/:article/comment/create', "CommentController@store");
$router->post('/article/:article/comment/:comment/create', "CommentController@store");



$router->run();
