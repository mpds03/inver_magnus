<?php

require_once './config/database.php';
require_once './model/FacturaModel.php';
require_once './model/CompraDirectaModel.php';

class PedidosController {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listarPedidos() {
        $facturaModel = new FacturaModel($this->db);
        $compraDirectaModel = new CompraDirectaModel($this->db);

        // Pedidos de carrito (facturas)
        $stmt = $this->db->query("SELECT * FROM factura ORDER BY fecha DESC");
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Pedidos de compra directa
        $stmt2 = $this->db->query("SELECT * FROM compra ORDER BY idCompra DESC");
        $comprasDirectas = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        include './views/admin_pedidos.php';
    }
}