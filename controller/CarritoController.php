<?php
require_once './model/CarritoModel.php';
require_once './config/database.php';

class CarritoController {
    private $db;
    private $model;
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new CarritoModel($this->db);
    }

    // Agregar producto al carrito
    public function agregar() {
        session_start();
        if (!isset($_SESSION['cliente'])) { echo 'Debes iniciar sesión.'; return; }
        $numero_documento = $_SESSION['cliente']['numero_documento'];
        $carrito = $this->model->obtenerCarrito($numero_documento);
        if (!$carrito) $idcarrito = $this->model->crearCarrito($numero_documento);
        else $idcarrito = $carrito['idcarrito'];
        $this->model->agregarProducto($idcarrito, $_POST['codigo'], $_POST['cantidad'], $_POST['precioUnitario']);
        header("Location: index.php?action=verCarrito");
        exit;
    }

    // Ver carrito
    public function ver() {
        session_start();
        if (!isset($_SESSION['cliente'])) { echo 'Debes iniciar sesión.'; return; }
        $numero_documento = $_SESSION['cliente']['numero_documento'];
        $carrito = $this->model->obtenerCarrito($numero_documento);
        $productos = $carrito ? $this->model->obtenerProductos($carrito['idcarrito']) : [];
        $idcarrito = $carrito ? $carrito['idcarrito'] : null;
        include './views/carrito.php';
    }

    // Eliminar producto del carrito
    public function eliminarProducto() {
        if (isset($_GET['idDetalleCarrito'])) {
            $this->model->eliminarProducto($_GET['idDetalleCarrito']);
        }
        header("Location: index.php?action=verCarrito");
        exit;
    }

    // Vaciar carrito
    public function vaciar() {
        session_start();
        $numero_documento = $_SESSION['cliente']['numero_documento'];
        $carrito = $this->model->obtenerCarrito($numero_documento);
        if ($carrito) {
            $this->model->vaciarCarrito($carrito['idcarrito']);
        }
        header("Location: index.php?action=verCarrito");
        exit;
    }
}
