<?php
require_once 'authhelper.php';
require_once 'authcontroller.php';
class UserController
{

    private $model;
    private $view;


    public function __construct()
    {
        $this->view = new view();   //al atributo le instacio la clase View del View.php
        $this->model = new model();
        $this->authHelper = new AuthHelper();
        $this->authController = new AuthController();
    }

    public function showUsuarios(){
        $rol = $this->authHelper->checkRol();
        if($rol){
       $users= $this->model->getAllUser();
       $roles =$this->model->getAllRoles();
       $this->view->renderUsers($users, $roles);}
       else{
        echo "No tiene derechos de administrador";
       }
    }

    public function editarUsuario(){
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
