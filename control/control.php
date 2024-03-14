<?php

require_once 'libs/smarty_4_4_1/configuracion.php';
require_once 'model/model.php';

class control{
    
    private $view ;
    private $model;


    public static $tarjeta = 1000000; 
    
    public function __construct(){
       $this->view  = new configuracion();
       $this->model = new model();    
    }
    
    public function gestor_procesos(){
 
        if(isset($_REQUEST['accion'])){
            
            $accion = $_REQUEST['accion'];
            
            switch ($accion) {
                case 'Ingresar':
                    $this->c_Ingresar();
                    break;
                case 'Extraer':
                    $this->c_extraerDinero();
                    break;
                case 'Pasar':
                    $this->c_pasarDinero();
                    break;
                case 'Saldo':
                    $this->c_verSaldo();
                    break;
                default:
                    break;
            }
       
        }else{
            $this->view->setDisplay("login");
        }
    }
    

    public function c_Ingresar(){
        $pin = $_REQUEST['pin'];

        if ($pin == '1234'){

            $this->view->setDisplay("opciones");

        }else{
            $this->view->setDisplay("login");
        }
        // $rs = $this->model->m_validarLogin($correo, $pass);
    }

    public function c_extraerDinero(){
        $this->view->setDisplay("extraer");
        $saldo = self::$tarjeta;
        $monto = $_REQUEST['monto'];
        $total = $saldo - $monto;
        self::$tarjeta = $total;

        echo $total;
    }

    public function c_pasarDinero(){
        $this->view->setDisplay("pasarDinero");
    }

    public function c_verSaldo(){
        $this->view->setDisplay("saldo");
        $total = self::$tarjeta;
        echo $total;
    }
    
    










    public function getView() {
        return $this->view;
    }

    public function getModel() {
        return $this->model;
    }

    public function setView($view): void {
        $this->view = $view;
    }

    public function setModel($model): void {
        $this->model = $model;
    }
 
}
?>
