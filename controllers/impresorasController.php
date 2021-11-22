<?php
require_once 'helper/authhelper.php';
require_once 'view/usuarios.view.php';

class impresorasController
{

    private $impresoramodel;
    private $userview;
    private $user;

    public function __construct()
    {
        $this->userview = new UserView();   //al atributo le instacio la clase View del View.php
        $this->impresoramodel = new ImpresoraModel();
        $this->user = new AuthHelper();
        
    }

    /*---------------- Administrar Impresoras ------------------- */

    function agregarImpresora()
  
    {       
        $marca = $_REQUEST['marca'];
        $modelo = $_REQUEST['modelo'];
        $descripcion = $_REQUEST['descripcion'];
        $metodo = $_REQUEST['select_metodo'];
        $this->impresoramodel->createImpresora($marca, $modelo, $descripcion, $metodo);
        $this->userview->refreshAdmin();
    }

    function editarImpresora()
    {
        $id_impresora = $_REQUEST['id_impresora'];
        $marca = $_REQUEST['marca'];
        $modelo = $_REQUEST['modelo'];
        $descripcion = $_REQUEST['descripcion'];
        $metodo = $_REQUEST['select_metodo'];
        $this->impresoramodel->editImpresora($id_impresora, $marca, $modelo, $descripcion, $metodo);
        $this->userview->refreshAdmin();
    }

    function eliminarImpresora($id)
    {
        $rol= $this->user->checkRol();
        if ($rol){
        $this->impresoramodel->deleteImpresoraByID($id);
        $this->userview->refreshAdmin();
        }
        else{
            echo "Ud. no puede eliminar impresora";
        }
    }

}
