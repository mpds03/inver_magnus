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

        // Obtener detalles de cada factura con nombre de producto
        foreach ($facturas as &$factura) {
            $stmt2 = $this->db->prepare("
                SELECT d.*, p.nombre 
                FROM detalle_factura d
                JOIN producto p ON d.codigo = p.codigo
                WHERE d.IdFactura = ?
            ");
            $stmt2->execute([$factura['IdFactura']]);
            $factura['detalles'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }

        include './views/admin_pedidos.php';
    }

    public function listarPedidosCliente() {
        session_start();
        if (!isset($_SESSION['cliente']['numero_documento'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $numero_documento = $_SESSION['cliente']['numero_documento'];

        // Obtener facturas del cliente
        $stmt = $this->db->prepare("
            SELECT f.*, e.nombre AS nombre_estado
            FROM factura f
            LEFT JOIN estado_factura e ON f.estado = e.id
            WHERE f.numero_documento = ?
            ORDER BY f.fecha DESC
        ");
        $stmt->execute([$numero_documento]);
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Obtener detalles de cada factura
        foreach ($facturas as &$factura) {
            $stmt2 = $this->db->prepare("
                SELECT d.*, p.nombre 
                FROM detalle_factura d
                JOIN producto p ON d.codigo = p.codigo
                WHERE d.IdFactura = ?
            ");
            $stmt2->execute([$factura['IdFactura']]);
            $factura['detalles'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }

        include './views/cliente_pedidos.php';
    }
}