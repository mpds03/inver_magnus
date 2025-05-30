<?php
require_once './model/CompraDirectaModel.php';
require_once './config/database.php';

class CompraDirectaController{
    private $db;
    private $CompraDirectaModel;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->CompraDirectaModel = new CompraDirectaModel($this->db);
    }

    //aca se supone que va el resto y eso asasjas
     public function comprar() {
        session_start();
        if (!isset($_SESSION['cliente'])) { echo 'Debes iniciar sesión.'; return; }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero_documento = $_SESSION['cliente']['numero_documento'];
            $direccion = $_POST['direccion'];
            $idCompra = $this->CompraDirectaModel->crearCompra($numero_documento, $direccion);
            header("Location: index.php?action=InverBoard&mensaje=compra_exitosa");
            exit;
        }
        include './views/compra_directa.php';
    }
    
    
}