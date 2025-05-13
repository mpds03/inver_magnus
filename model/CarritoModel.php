<?php
class CarritoModel
{
    private $conn;
    private $table = 'Carrito';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function InsertCarrito($idcarrito, $numero_documento)
    {
        $query = "INSERT INTO " . $this->table . "(idcarrito, numero_documento) VALUES (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idcarrito, $numero_documento]);
    }

    public function getCompra()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
