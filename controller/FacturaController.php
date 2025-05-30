<?php
require_once './model/FacturaModel.php';
require_once './config/database.php';

class FacturaController {
    private $db;
    private $model;
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new FacturaModel($this->db);
    }
    public function generar($productos, $numero_documento) {
        $total = 0;
        foreach ($productos as $p) $total += $p['cantidad'] * $p['precio_unitario'];
        $idFactura = $this->model->crearFactura($numero_documento, $total);
        foreach ($productos as $p) {
            $this->model->agregarDetalle($idFactura, $p['codigo'], $p['cantidad'], $p['precio_unitario'], $p['cantidad'] * $p['precio_unitario']);
        }
        return $idFactura;
    }
}