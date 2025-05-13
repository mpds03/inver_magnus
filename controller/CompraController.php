<?php
require_once './model/CompraModel.php';
require_once './config/database.php';

class CompraController{
    private $db;
    private $CompraModel;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->CompraModel = new CompraModel($this->db);
    }

    //aca se supone que va el resto y eso asasjas
    public function HacerCompra(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero_documento = $_POST['numero_documento']; //doc del usuario
            $direccion = $_POST['direccion']; //direccion del usuario
            $idCompra = $this->CompraModel->agregarDetalleCompra($idcompra, $codigo, $cantidad, $precioUnitario);
        }

    //public function 

    }
    
    
}