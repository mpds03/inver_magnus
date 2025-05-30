<?php
require_once './config/database.php';

class FacturaController {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    public function generar($productos, $numero_documento) {
        require_once './model/FacturaModel.php';
        $facturaModel = new FacturaModel($this->db);

        // Calcular total
        $total = 0;
        foreach ($productos as $p) {
            $total += $p['cantidad'] * $p['precioUnitario'];
        }

        // Crear factura
        $idFactura = $facturaModel->crearFactura($numero_documento, $total);

        // Agregar detalles y armar array de detalles para la vista
        $detalles = [];
        foreach ($productos as $p) {
            $facturaModel->agregarDetalle($idFactura, $p['codigo'], $p['cantidad'], $p['precioUnitario'], $p['cantidad'] * $p['precioUnitario']);
            $detalles[] = [
                'codigo' => $p['codigo'],
                'cantidad' => $p['cantidad'],
                'precio_unitario' => $p['precioUnitario'],
                'total_detalle' => $p['cantidad'] * $p['precioUnitario']
            ];
        }

        // Obtener datos de la factura para la vista
        $factura = [
            'IdFactura' => $idFactura,
            'fecha' => date('Y-m-d'),
            'numero_documento' => $numero_documento,
            'total' => $total
        ];

        // Vaciar el carrito después de la compra
        $carrito = (new CarritoModel($this->db))->obtenerCarrito($numero_documento);
        if ($carrito) {
            (new CarritoModel($this->db))->vaciarCarrito($carrito['idcarrito']);
        }

        return ['factura' => $factura, 'detalles' => $detalles];
    }
}