<?php
require_once 'libs/Router.php';
require_once 'api/api-coment.controller.php';


$router = new Router();

$router->addRoute('comentario/impresora/:ID', 'POST', 'ApiTaskController', 'addComent');
$router->addRoute('comentario/impresora/:ID', 'GET', 'ApiTaskController', 'showImpresora');
$router->addRoute('comentario/:ID', 'DELETE', 'ApiTaskController', 'removeComentario');


$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource, $method);
