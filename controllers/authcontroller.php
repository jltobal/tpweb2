<?php

require_once 'models/user.model.php';
require_once 'helper/authhelper.php';
require_once 'view/impresora.view.php';

class AuthController
{
    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new view();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin()
    {
        $this->view->renderLogin();  //Muestro formulario de Login.
    }

    public function showLogout()
    {
        $this->authHelper->logout();        
    }

    public function login()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);   // Busco el usuario en la BDD.

            if ($user && password_verify($password, $user->password)) { //Verifico si coincide el usuario y la contraseña.
                $this->authHelper->login($user);  //creo la sesion del usuario.
                header('LOCATION:' .BASE_URL);
            } else {
                $this->view->renderLogin("Usuario o contraseña invalido.");
            }
        }
    }
}