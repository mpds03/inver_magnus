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

    public function HacerCompra($numero_documento, $dirección)
    {
        $query = "INSERT INTO " . $this->table . "(numero_documento, dirección) VALUES (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$numero_documento, $dirección]);
        return $this->conn->lastInsertId();
    }

    public function agregarDetalleCompra($iddetalle, $idfactura, $codigo, $cantidad, $precio_unitario, $total_detalle)
    {
        $query = "INSERT INTO" . $this->table2 . "(IdDetalle, IdFactura, codigo, cantidad, precio_unitario, total_detalle) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$iddetalle, $idfactura, $codigo, $cantidad, $precio_unitario, $total_detalle]);
        //return $this->conn->lastInsertId();
    }
}
