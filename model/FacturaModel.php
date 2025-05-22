<?php
class FacturaModel
{

    private $conn;
    private $table = 'factura';

    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    public function insertFactura($idfactura, $fecha, $numero_documento, $total)
    {
        $query = "INSERT INTO " . $this->table . "(idfactura, fecha, numero_documento, total) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idfactura, $fecha, $numero_documento, $total]);
    }
    
}