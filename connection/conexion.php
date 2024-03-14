<?php
// template para mysql
class conexion{

    private $usuario;
    private $pass;
    private $server;
    private $db;

    private $link;

    public function __construct()
    {
        $this->usuario = "root";
        $this->pass = "";
        $this->server = "localhost";
        $this->db = "pg3_m";
        $this->link = "";
    }

    public function conectarDB(){
        $this->link = new mysqli($this->server,  $this->usuario, $this->pass, $this->db);

        if($this->link->connect_error){
            echo "error! en conexion";
            exit;
        }
    }

    public function desconectarDB(){
        mysqli_close($this->link);
    }

    public function ejecutarSql($sql){
        $rs = $this->link->query($sql);
        return $rs;
    }

    public function aplicarCommit(){
        mysqli_commit($this->link);
    }

}
?>