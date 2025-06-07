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

    public function listarPedidosCliente() {
        // Supón que el número de documento del cliente está en $_SESSION['numero_documento']
        if (!isset($_SESSION['numero_documento'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $numero_documento = $_SESSION['numero_documento'];

        // Facturas del cliente
        $stmt = $this->db->prepare("SELECT * FROM factura WHERE numero_documento = ? ORDER BY fecha DESC");
        $stmt->execute([$numero_documento]);
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Compras directas del cliente
        $stmt2 = $this->db->prepare("SELECT * FROM compra WHERE numero_documento = ? ORDER BY IdCompra DESC");
        $stmt2->execute([$numero_documento]);
        $comprasDirectas = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        include './views/pedidos_cliente.php';
    }
}