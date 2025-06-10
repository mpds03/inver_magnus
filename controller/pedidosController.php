<?php

require_once './config/database.php';
require_once './model/FacturaModel.php';

class PedidosController {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listarPedidos() {
        $where = '';
        $params = [];

        if (!empty($_GET['buscar_documento'])) {
            $where = 'WHERE numero_documento = ?';
            $params[] = $_GET['buscar_documento'];
        }

        // Solo facturas
        $stmt = $this->db->prepare("SELECT * FROM factura $where ORDER BY fecha DESC");
        $stmt->execute($params);
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include './views/admin_pedidos.php';
    }

    public function listarPedidosCliente() {
        session_start();
        if (!isset($_SESSION['cliente']['numero_documento'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $numero_documento = $_SESSION['cliente']['numero_documento'];

        // Solo facturas del cliente
        $stmt = $this->db->prepare("SELECT * FROM factura WHERE numero_documento = ? ORDER BY fecha DESC");
        $stmt->execute([$numero_documento]);
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include './views/cliente_pedidos.php';
    }
}