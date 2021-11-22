<?php

require_once 'helper/authhelper.php';
require_once 'controllers/authcontroller.php';

class controller
{

    private $modelimpresora;
    private $metodomodel;
    private $modelUser;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->view = new view();   
        $this->modelimpresora = new ImpresoraModel();
        $this->metodomodel = new MetodoModel();
        $this->modelUser = new UserModel();
        $this->authHelper = new AuthHelper();
        $this->authController = new AuthController();        
    }

    /*-------------- Render de Views ---------------*/

    function showHome()
    {
        $allPrinters = $this->modelimpresora->getAllPrinters(); //llamas a la base de datos.
        $this->view->renderHome($allPrinters);
    }

    function showDetails()
    {
             
        $id = $_REQUEST['id'];
        $detalles = $this->modelimpresora->getPrinterByID($id);  //llamo por id a la db.
        $this->view->renderDetails($detalles);          //tipo, modelo, dpi, toner, tinta.
    }

    function showFilter()
    {
        $Metodos = $this->metodomodel->getAllMetodos();
        $this->view->renderFilter($Metodos);         //quiero impresoras laser color.
    }
    function showFiltrado($filtro)
    {
        $impresoras = $this->modelimpresora->getAllPrinters();
        $this->view->renderFiltrado($impresoras, $filtro);
    }


    /*------------  Registro y Vista Admin ----------*/

    function showAdmin()
    {
        
        $rol = $this->authHelper->checkRol();

        if ($rol) {   
            $this->authHelper->checkLoggedIn();       
            $impresoras = $this->modelimpresora->getAllPrinters();
            $metodos = $this->metodomodel->getAllMetodos();
            $this->view->renderAdmin($impresoras, $metodos);   //agregar, borrar, editar.
        } else {
            echo "No tiene derechos de administrador";
        }
    }

    function showRegister()
    {       
        $this->view->renderRegister();
        if (!empty($_POST['email']) && !empty($_POST['password'])) {  //Verifico si los campos estan vacios o no.
            $userEmail = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->modelUser->registerUser($userEmail, $userPassword);
            $this->authController->login();
        }
    }
}
