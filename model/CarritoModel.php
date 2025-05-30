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
    public function obtenerCarrito($numero_documento) {
        $stmt = $this->db->prepare("SELECT * FROM carrito WHERE numero_documento = ?");
        $stmt->execute([$numero_documento]);
        return $stmt->fetch();
    }
    public function crearCarrito($numero_documento) {
        $stmt = $this->db->prepare("INSERT INTO carrito (numero_documento) VALUES (?)");
        $stmt->execute([$numero_documento]);
        return $this->db->lastInsertId();
    }
    public function agregarProducto($idcarrito, $codigo, $cantidad, $precioUnitario) {
        $stmt = $this->db->prepare("INSERT INTO detalle_carrito (idcarrito, codigo, cantidad, precioUnitario) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idcarrito, $codigo, $cantidad, $precioUnitario]);
    }
    public function obtenerProductos($idcarrito) {
        $stmt = $this->db->prepare("SELECT * FROM detalle_carrito WHERE idcarrito = ?");
        $stmt->execute([$idcarrito]);
        return $stmt->fetchAll();
    }
}
