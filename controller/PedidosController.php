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

        $where = '';
        $params = [];

        if (!empty($_GET['buscar_documento'])) {
            $where = 'WHERE numero_documento = ?';
            $params[] = $_GET['buscar_documento'];
        }

        // Facturas
        $stmt = $this->db->prepare("SELECT * FROM factura $where ORDER BY fecha DESC");
        $stmt->execute($params);
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Compras directas
        $stmt2 = $this->db->prepare("SELECT * FROM compra $where ORDER BY IdCompra DESC");
        $stmt2->execute($params);
        $comprasDirectas = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        include './views/admin_pedidos.php';
    }
}