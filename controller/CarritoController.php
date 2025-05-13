<?php
require_once './model/CarritoModel.php';
require_once './config/database.php';

class CarritoController{
    private $db;
    private $CarritoModel;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->CarritoModel = new CarritoModel($this->db);
    }

    public function InsertCarrito(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idcarrito = $_POST['idcarrito']; //id del carrito
            $numero_documento = $_POST['numero_documento'];//doc del usuario

            $this->CarritoModel->InsertCarrito($idcarrito, $numero_documento);
            header("Location: index.php?action=carrito");
        }
    }

    public function getCompra()
    {
        return $this->CarritoModel->getCompra();
    }
}