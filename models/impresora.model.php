<?php

class ImpresoraModel
{

    private $db_impresoras;

    public function __construct()
    {
        $this->db_impresoras = new PDO('mysql:host=localhost;' . 'dbname=db_impresoras;charset=utf8', 'root', '');
        
    }

    function getPrinterByID($parametro)
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM impresoras WHERE id_impresora=?');
        $query->execute([$parametro]);
        $impresora= $query->fetchAll(PDO::FETCH_OBJ);
        return $impresora;
    }

    function getAllPrinters()
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM impresoras JOIN metodos ON impresoras.id_metodo_fk=metodos.id_metodo');
        $query->execute();
        $allPrinters = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las impresoras.
        return $allPrinters;
    }


    function createImpresora($marca, $modelo, $descripcion, $metodo)
    {
        $query = $this->db_impresoras->prepare('INSERT INTO impresoras (modelo, marca, descripcion, id_metodo_fk) VALUES (?,?,?,?)');
        $query->execute([$modelo, $marca, $descripcion, $metodo]);
    }

    function editImpresora($id_impresora, $marca, $modelo, $descripcion, $metodo)
    {
        $query = $this->db_impresoras->prepare('UPDATE impresoras SET modelo=?, marca=?, descripcion=?, id_metodo_fk=? WHERE id_impresora=?');
        $query->execute([$modelo, $marca, $descripcion, $metodo, $id_impresora]);
    }

    function deleteImpresoraByID($id)
    {
        $query = $this->db_impresoras->prepare('DELETE FROM impresoras WHERE id_impresora= ?');
        $query->execute([$id]);
    }

    function getPrinterByMetodo($id)
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM impresoras WHERE impresoras.id_metodo_fk=?');
        $query->execute([$id]);
        $printerByMetodo = $query->fetch(PDO::FETCH_OBJ);
        return $printerByMetodo;
    }
   
    /*function getAllMetodos()
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM metodos');
        $query->execute();
        $allMetodos = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las impresoras.
        return $allMetodos;
    }

    function deleteMetodoByID($id)
    {
        $query = $this->db_impresoras->prepare('DELETE FROM metodos WHERE id_metodo= ?');
        $query->execute([$id]);
    }

    function getPrinterByMetodo($id)
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM impresoras WHERE impresoras.id_metodo_fk=?');
        $query->execute([$id]);
        $printerByMetodo = $query->fetch(PDO::FETCH_OBJ);
        return $printerByMetodo;
    }

    function createMetodo()
    {
        $newMetodo = $_POST['input_metodo'];
        $query = $this->db_impresoras->prepare('INSERT INTO metodos (id_metodo, metodo) VALUES (?,?)');
        $query->execute(['', $newMetodo]);
    }

    function editarMetodo($id, $newMetodo)
    {
        $query = $this->db_impresoras->prepare('UPDATE metodos SET metodo=? WHERE id_metodo=?');
        $query->execute([$newMetodo, $id]);
    }

*/

}
