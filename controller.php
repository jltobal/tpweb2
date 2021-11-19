<?php

require_once 'authhelper.php';
require_once 'authcontroller.php';

class controller
{

    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->view = new view();   //al atributo le instacio la clase View del View.php
        $this->model = new model();
        $this->authHelper = new AuthHelper();
        $this->authController = new AuthController();
    }

    /*-------------- Render de Views ---------------*/

    function showHome()
    {
        $allPrinters = $this->model->getAllPrinters(); //llamas a la base de datos.
        $this->view->renderHome($allPrinters); 
    }

    function showDetails()
    {
        $id = $_REQUEST['id'];
        $detalles = $this->model->getPrinterByID($id);  //llamo por id a la db.
        $this->view->renderDetails($detalles);          //tipo, modelo, dpi, toner, tinta.
    }

    function showFilter()
    {
        $Metodos = $this->model->getAllMetodos();
        $this->view->renderFilter($Metodos);         //quiero impresoras laser color.
    }
    function showFiltrado($filtro)
    {
        $impresoras = $this->model->getAllPrinters();
        $this->view->renderFiltrado($impresoras, $filtro);
    }


    /*------------  Registro y Vista Admin ----------*/

    function showAdmin()    {
        $rol = $this->authHelper->checkRol();
        
        if($rol){
        $this->authHelper->checkLoggedIn();
        $impresoras = $this->model->getAllPrinters();
        $metodos = $this->model->getAllMetodos();
        $this->view->renderAdmin($impresoras, $metodos);   //agregar, borrar, editar.
        }
        else{
            echo "No tiene derechos de administrador";
        }
    }

    function showRegister()
    {
        $this->view->renderRegister();
        if (!empty($_POST['email']) && !empty($_POST['password'])) {  //Verifico si los campos estan vacios o no.
            $userEmail = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->model->registerUser($userEmail, $userPassword);
            $this->authController->login();
        }
    }







}
