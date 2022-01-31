<?php

namespace App;

use Router\Router;


require_once('vendor/autoload.php');

$router = new Router($_GET['url']);

$router->get('/', 'App\Controller\ArticleController@showAll');
$router->post("/ArticleA", "App\Controller\ArticleController@add");
$router->get("/ArticleA", "App\Controller\ArticleController@add");
$router->get("/ArticleM/:id", "App\Controller\ArticleController@modify");
$router->post("/ArticleM/:id", "App\Controller\ArticleController@modify");
$router->post("/ArticleD/:id", "App\Controller\ArticleController@delete");

$router->post("/EditorA", "App\Controller\EditorController@add");
$router->get("/EditorA", "App\Controller\EditorController@add");
$router->get("/EditorM/:id", "App\Controller\EditorController@modify");
$router->post("/EditorM/:id", "App\Controller\EditorController@modify");
$router->get("/EditorD/:id", "App\Controller\EditorController@delete");

$router->get("/VisitorA", "App\Controller\VisitorController@add");
$router->post("/VisitorA", "App\Controller\VisitorController@add");
$router->post("/VisitorM/:id", "App\Controller\VisitorController@modify");
$router->get("/VisitorM/:id", "App\Controller\VisitorController@modify");
$router->get("/VisitorD/:id", "App\Controller\VisitorController@delete");

$router->get("/AvisA", "App\Controller\AvisController@add");
$router->post("/AvisA", "App\Controller\AvisController@add");
$router->run();