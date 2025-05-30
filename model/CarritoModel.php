<?php
class CarritoModel
{
    private $conn;
    private $table = 'carrito';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function obtenerCarrito($numero_documento) {
        $stmt = $this->conn->prepare("SELECT * FROM carrito WHERE numero_documento = ?");
        $stmt->execute([$numero_documento]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearCarrito($numero_documento) {
        $stmt = $this->conn->prepare("INSERT INTO carrito (numero_documento) VALUES (?)");
        $stmt->execute([$numero_documento]);
        return $this->conn->lastInsertId();
    }

    public function agregarProducto($idcarrito, $codigo, $cantidad, $precioUnitario) {
        $stmt = $this->conn->prepare("INSERT INTO detalle_carrito (idcarrito, codigo, cantidad, precioUnitario) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idcarrito, $codigo, $cantidad, $precioUnitario]);
    }

    public function obtenerProductos($idcarrito) {
        $stmt = $this->conn->prepare("
            SELECT dc.idDetalleCarrito, dc.codigo, dc.cantidad, dc.precioUnitario, 
                   p.nombre, p.descripcion, p.foto
            FROM detalle_carrito dc
            JOIN producto p ON dc.codigo = p.codigo
            WHERE dc.idcarrito = ?
        ");
        $stmt->execute([$idcarrito]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarProducto($idDetalleCarrito) {
        $stmt = $this->conn->prepare("DELETE FROM detalle_carrito WHERE idDetalleCarrito = ?");
        $stmt->execute([$idDetalleCarrito]);
    }

    public function vaciarCarrito($idcarrito) {
        $stmt = $this->conn->prepare("DELETE FROM detalle_carrito WHERE idcarrito = ?");
        $stmt->execute([$idcarrito]);
    }
}
