<?php
require_once 'authhelper.php';

class metodoController
{

    private $model;
    private $view;


    public function __construct()
    {
        $this->view = new view();   //al atributo le instacio la clase View del View.php
        $this->model = new model();
    }

    /* --------- Administracion de Metodos ----------*/
    function agregarMetodo()

    {
        $this->model->createMetodo();
        $this->view->refreshAdmin();
    }

    function editMetodo()
    {
        $id = $_POST['id_metodo'];
        $newMetodo = $_POST['input_metodo'];
        $this->model->editarMetodo($id, $newMetodo);
        $this->view->refreshAdmin();
    }

    function deleteMetodo($id)
    {
        $ImpresoraID = $this->model->getPrinterByMetodo($id); //llamo por id a la db.
        if (!empty($ImpresoraID)) {
            $this->view->refreshAdmin();
        } else {
            $this->model->deleteMetodoByID($id); //llamo por id a la db.
            $this->view->refreshAdmin();
        }
    }
}
