<?php
require_once './model/FacturaModel.php';
require_once './config/database.php';

class FacturaController{
    private $db;
    private $FacturaModel;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->FacturaModel = new FacturaModel($this->db);
    }

    public function insertFactura(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idfactura = $_POST['idfactura'];
            $fecha = $_POST['fecha'];
            $numero_documento = $_POST['numero_documento'];
            $total = $_POST['total'];

            $this->FacturaModel->insertFactura($idfactura, $fecha, $numero_documento, $total);
            header("Location: index.php?action=carrito");
        }
    }
}