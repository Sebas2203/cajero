<?php
// conectar con base de datos 
require_once 'connection/conexion.php';
// debe de tener la capacidad de poder ejecular los scrips contra la base de datos 
class model{
    
    private $db;

    public function __construct()
    {
        $this->db = new conexion();
        
    }

    public function m_validarLogin($usuario, $password){
        $this->db->conectarDB();
        $sql = "SELECT * FROM USUARIOS WHERE USUARIOS = '$usuario' AND PASS = '$password'";
        $rs = $this->db->ejecutarSql($sql);


        var_dump($rs);
        print_r($rs);
        $this->db->desconectarDB();
        exit;
    }




}







?>