<?php
require_once 'helper/authhelper.php';

class metodoController
{

    private $metodomodel;   
    private $impresoramodel;
    private $view;


    public function __construct()
    {
        $this->view = new view();
        $this->metodomodel = new MetodoModel();
        $this->impresoramodel = new ImpresoraModel();
    }


    function agregarMetodo()
    {
        $this->metodomodel->createMetodo();
        $this->view->refreshAdmin();
    }

    function editMetodo()
    {
        $id = $_POST['id_metodo'];
        $newMetodo = $_POST['input_metodo'];
        $this->metodomodel->editarMetodo($id, $newMetodo);
        $this->view->refreshAdmin();
    }

    function deleteMetodo($id)
    {
        $ImpresoraID = $this->impresoramodel->getPrinterByMetodo($id);
        if (!empty($ImpresoraID)) {
            $this->view->refreshAdmin();
        } else {
            $this->metodomodel->deleteMetodoByID($id);
            $this->view->refreshAdmin();
        }
    }
}
