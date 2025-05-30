<?php
class CompraDirectaModel
{
    private $conn;
    private $table = 'compra';
    private $table2 = 'detalle_factura';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function crearCompra($numero_documento, $direccion) {
        $stmt = $this->conn->prepare("INSERT INTO compra (numero_documento, direccion) VALUES (?, ?)");
        $stmt->execute([$numero_documento, $direccion]);
        return $this->conn->lastInsertId();
    }

    public function actualizarEstado($idCompra, $nuevo_estado) {
        $stmt = $this->conn->prepare("UPDATE compra SET estado = ? WHERE IdCompra = ?");
        $stmt->execute([$nuevo_estado, $idCompra]);
    }

    public function eliminarCompra($idCompra) {
        $stmt = $this->conn->prepare("DELETE FROM compra WHERE IdCompra = ?");
        $stmt->execute([$idCompra]);
    }
}
