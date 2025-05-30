<?php
class FacturaModel
{

    private $conn;
    private $table = 'factura';

    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    public function crearFactura($numero_documento, $total) {
        $stmt = $this->conn->prepare("INSERT INTO factura (fecha, numero_documento, total) VALUES (CURDATE(), ?, ?)");
        $stmt->execute([$numero_documento, $total]);
        return $this->conn->lastInsertId();
    }
    public function agregarDetalle($idFactura, $codigo, $cantidad, $precio_unitario, $total_detalle) {
        $stmt = $this->conn->prepare("INSERT INTO detalle_factura (IdFactura, codigo, cantidad, precio_unitario, total_detalle) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$idFactura, $codigo, $cantidad, $precio_unitario, $total_detalle]);
    }
}