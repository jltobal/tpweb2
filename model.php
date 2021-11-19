<?php

class model
{

    private $db_impresoras;

    public function __construct()
    {
        $this->db_impresoras = new PDO('mysql:host=localhost;' . 'dbname=db_impresoras;charset=utf8', 'root', '');
        //Llama al servidor y me crea un objeto con la respuesta.
    }

    function getPrinterByID($parametro)
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM impresoras WHERE id_impresora=?');
        $query->execute([$parametro]);
        $impresoras = $query->fetchAll(PDO::FETCH_OBJ);
        return $impresoras;
    }

    function getAllPrinters()
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM impresoras JOIN metodos ON impresoras.id_metodo_fk=metodos.id_metodo');
        $query->execute();
        $allPrinters = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las impresoras.
        return $allPrinters;
    }

    function getAllMetodos()
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM metodos');
        $query->execute();
        $allMetodos = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las impresoras.
        return $allMetodos;
    }

    function getPrinterByFilter($filtro)
    {

        $query = $this->db_impresoras->prepare('SELECT * FROM metodos WHERE metodo=?');
        $query->execute([$filtro]);
        $impresoras = $query->fetch(PDO::FETCH_OBJ);
        return $impresoras;
    }

    function getUser($email)
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM usuarios WHERE email = ?'); //Busco user en la BDD.
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function registerUser($userEmail, $userPassword)
    {
        $query = $this->db_impresoras->prepare('INSERT INTO usuarios (email, password, id_rol_fk) VALUES (? , ?, ?)');  //Guardo en la BDD.
        $query->execute([$userEmail, $userPassword, 2]);
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

    /*Funciones de usuarios*/
    function getAllUser()
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM usuarios JOIN roles ON usuarios.id_rol_fk=roles.id_rol');
        $query->execute();
        $allUsers = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con todos los usuarios.
        return $allUsers;
    }

    function getAllRoles()
    {
        $query = $this->db_impresoras->prepare('SELECT * FROM roles');
        $query->execute();
        $allRoles = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las impresoras.
        return $allRoles;
    }

    function editUser($id_user, $rol)
    {
        $query = $this->db_impresoras->prepare('UPDATE usuarios SET id_rol_fk=? WHERE id=?');
        $query->execute([$rol, $id_user]);
    }

    function deleteUserByID($id)
    {
        $query = $this->db_impresoras->prepare('DELETE FROM usuarios WHERE id= ?');
        $query->execute([$id]);
    }




}
