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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero_documento = $_POST['numero_documento']; //doc del usuario
            $direccion = $_POST['direccion']; //direccion del usuario

            //insertar compra:
            $idCompra = $this->CompraDirectaModel->HacerCompra($numero_documento, $direccion);
            
            //verificar existencia de detalles en el POST
            if(isset($_POST['detalle_factura'])&& is_Array($_POST['detalle_factura'])){
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
            echo 'Compra hecha con exito :)';
        }

    //public function 

    }
    
    
}