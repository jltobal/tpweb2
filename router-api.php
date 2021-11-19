<?php
require_once 'libs/Router.php';
require_once 'api/api-task.controller.php';

// creo el router
$router = new Router();

// tabla de ruteo
$router->addRoute('tareas', 'GET', 'ApiTaskController', 'getAll');
$router->addRoute('tareas/:ID', 'GET', 'ApiTaskController', 'getOne');
$router->addRoute('tareas/:ID', 'DELETE', 'ApiTaskController', 'remove');
$router->addRoute('tareas', "POST", 'ApiTaskController', 'addTask');
$router->addRoute('tareas/:ID', "PUT", 'ApiTaskController', 'updateTask');


// rutea
$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource, $method);
