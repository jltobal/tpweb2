<?php
require_once 'helper/authhelper.php';

class metodoController
{

    private $metodomodel;   
    private $impresoramodel;
    private $userview;


    public function __construct()
    {
        $this->userview = new UserView();
        $this->metodomodel = new MetodoModel();
        $this->impresoramodel = new ImpresoraModel();
    }


    function agregarMetodo()
    {
        $this->metodomodel->createMetodo();
        $this->userview->refreshAdmin();
    }

    function editMetodo()
    {
        $id = $_POST['id_metodo'];
        $newMetodo = $_POST['input_metodo'];
        $this->metodomodel->editarMetodo($id, $newMetodo);
        $this->userview->refreshAdmin();
    }

    function deleteMetodo($id)
    {
        $ImpresoraID = $this->impresoramodel->getPrinterByMetodo($id);
        if (!empty($ImpresoraID)) {
            $this->userview->refreshAdmin();
        } else {
            $this->metodomodel->deleteMetodoByID($id);
            $this->userview->refreshAdmin();
        }
    }
}
