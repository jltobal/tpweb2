<?php
require_once 'models';
require_once 'api-view.php';

class ApiTaskController {
    private $model;


    function __construct() {
        $this->model = new TaskModel();
        $this->view = new ApiView();
    }

    
}