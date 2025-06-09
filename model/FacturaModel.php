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
        // Actualizar stock y deshabilitar si llega a 0
        $this->actualizarStockYEstado($codigo, $cantidad);
    }

    private function actualizarStockYEstado($codigo, $cantidadVendida) {
        // Obtener cantidad actual
        $stmt = $this->conn->prepare("SELECT cantidad FROM producto WHERE codigo = ?");
        $stmt->execute([$codigo]);
        $cantidadActual = $stmt->fetchColumn();

        if ($cantidadActual !== false) {
            $nuevaCantidad = $cantidadActual - $cantidadVendida;
            if ($nuevaCantidad < 0) $nuevaCantidad = 0;
            // Actualizar cantidad
            $stmt = $this->conn->prepare("UPDATE producto SET cantidad = ? WHERE codigo = ?");
            $stmt->execute([$nuevaCantidad, $codigo]);
            // Si la cantidad es 0, deshabilitar el producto (estado = 0)
            if ($nuevaCantidad == 0) {
                $stmt = $this->conn->prepare("UPDATE producto SET estado = 0 WHERE codigo = ?");
                $stmt->execute([$codigo]);
            }
        }
    }

    public function actualizarEstado($idFactura, $nuevo_estado) {
        $stmt = $this->conn->prepare("UPDATE factura SET estado = ? WHERE IdFactura = ?");
        $stmt->execute([$nuevo_estado, $idFactura]);
    }
    public function eliminarFactura($idFactura) {
        // Elimina los detalles primero
        $stmt = $this->conn->prepare("DELETE FROM detalle_factura WHERE IdFactura = ?");
        $stmt->execute([$idFactura]);
        // Luego elimina la factura
        $stmt = $this->conn->prepare("DELETE FROM factura WHERE IdFactura = ?");
        $stmt->execute([$idFactura]);
    }
}