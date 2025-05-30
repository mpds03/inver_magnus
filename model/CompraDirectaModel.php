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
}
