<?php
require_once 'models/coment.model.php';
require_once 'api/api.view.php';

class ApiTaskController
{
    private $model;

    function __construct()
    {
        $this->model = new ComentModel();
        $this->view = new ApiView();
    }
    private function getBody()
    {
        $data = file_get_contents("php://input");
        return json_decode($data);
    }

    public function addComent($params = null)
    {
        $id = $params[':ID'];
        $data = $this->getBody();
        $comentario = $data->coment;
        $puntaje = $data->puntaje;
        $idComentario =$this->model->insertComent($id, $comentario, $puntaje);
        $comentarios = $this->model->getComentbyID($idComentario);
                  
        if ($comentarios)
        $this->view->response($comentarios, 200);
          else
        $this->view->response("Comentario no creado", 500);
    
    }

    function showImpresora($params = null)
    {
        $id = $params[':ID'];
        $impresora = $this->model->getComentbyPrinter($id);
        $this->view->response($impresora);
    }


    public function removeComentario($params = null)
    {
        $id = $params[':ID'];
        $this->model->deleteComent($id);
    }
}
