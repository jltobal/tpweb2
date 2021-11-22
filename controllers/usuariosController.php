<?php
require_once 'helper/authhelper.php';
require_once 'controllers/authcontroller.php';

class UserController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new view();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
        $this->authController = new AuthController();
      
    }

    public function showUsuarios()
    {
        $this->authHelper->checkLoggedIn();
        $rol = $this->authHelper->checkRol();
        if ($rol) {
            $users = $this->model->getAllUser();
            $roles = $this->model->getAllRoles();
            $this->view->renderUsers($users, $roles);
        } else {
            echo "No tiene derechos de administrador";
        }
    }

   function editarUsuario()
    {
        $id_user = $_REQUEST['id_user'];
        $rol = $_REQUEST['select_rol'];
        $this->model->editUser($id_user, $rol);
        $this->view->refreshUsers();
    }

    function eliminarUsuario($id)
    {
        $this->model->deleteUserByID($id);
        $this->view->refreshUsers();
    }
}
