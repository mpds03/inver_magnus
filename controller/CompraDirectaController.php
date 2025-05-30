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
    public function HacerCompra(){
        session_start();
        // Solo permite comprar si el usuario está logueado
        if (!isset($_SESSION['cliente'])) {
            echo 'Debes iniciar sesión para comprar.';
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtiene los datos del usuario desde la sesión
            $numero_documento = $_SESSION['cliente']['numero_documento'];
            $direccion = $_SESSION['cliente']['direccion']; // Debe estar en la sesión

            // Inserta la compra
            $idCompra = $this->CompraDirectaModel->HacerCompra($numero_documento, $direccion);

            // Verifica y agrega los detalles de la compra
            if(isset($_POST['detalle_factura']) && is_array($_POST['detalle_factura'])){
                foreach ($_POST['detalle_factura'] as $detalle){
                    $iddetalle = $detalle['IdDetalle'];
                    $idfactura = $detalle['IdFactura'];
                    $codigo = $detalle['codigo'];
                    $cantidad = $detalle['cantidad'];
                    $precio_unitario = $detalle['precio_unitario'];
                    $total_detalle = $detalle['total_detalle'];

                    $this->CompraDirectaModel->agregarDetalleCompra($iddetalle, $idfactura, $codigo, $cantidad, $precio_unitario, $total_detalle);
                }
            }
            // Redirige para evitar el reenvío del formulario
            header("Location: index.php?action=InverBoard&mensaje=compra_exitosa");
            exit;
        }
    }
    
    
}