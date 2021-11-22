<?php

require_once 'smarty/libs/Smarty.class.php';


class UserView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function renderAdmin($impresoras, $metodos)
    {
        $this->smarty->assign('titulo', 'Administrar');
        $this->smarty->assign('impresora', $impresoras);
        $this->smarty->assign('metodo', $metodos);
        $this->smarty->display('templates/administrar.tpl');
    }

    public function renderRegister()
    {
        $this->smarty->assign('titulo', 'Registrar');
        $this->smarty->display('templates/registrar.tpl');
    }

    public function renderLogin($error = null)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }


    public function refreshAdmin()
    {
        header('Location: ' . BASE_URL . 'administrar');
    }
    public function refreshUsers()
    {
        header('Location: ' . BASE_URL . 'usuarios');
    }


    public function renderUsers($users, $roles)
    {
        $this->smarty->assign('usuarios', $users);
        $this->smarty->assign('roles', $roles);
        $this->smarty->display('templates/usuarios.tpl');
    }
}
