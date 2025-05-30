<?php
require_once './model/CarritoModel.php';
require_once './config/database.php';

class CarritoController
{
    private $db;
    private $CarritoModel;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->CarritoModel = new CarritoModel($this->db);
    }

    public function verCarrito()
    {
        session_start();
        if (!isset($_SESSION['cliente'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
        // Aquí deberías obtener los datos de los productos desde la base de datos usando los códigos del carrito
        include './views/verCarrito.php';
    }

    public function palCarrito() //AÑADIR AL CARRITO:
    {
        session_start();
        if (!isset($_SESSION['cliente'])) {
            header("Location: index.php?action=login");
            exit;
        }
        if ($_GET['action'] == 'palCarrito' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $codigo = $_POST['codigo'];
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }
            // Si ya existe, suma 1; si no, lo pone a 1
            if (isset($_SESSION['carrito'][$codigo])) {
                $_SESSION['carrito'][$codigo]++;
            } else {
                $_SESSION['carrito'][$codigo] = 1;
            }
            header("Location: index.php?action=verCarrito");
            exit;
        }
    }

    public function confirmarCompra()
    {
        session_start();
        if (!isset($_SESSION['cliente'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $numero_documento = $_SESSION['cliente']['numero_documento'];
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
        if (empty($carrito)) {
            header("Location: index.php?action=verCarrito&msg=Carrito vacío");
            exit;
        }
        // Guarda la compra en la base de datos (puedes mejorar la lógica según tu modelo)
        $idcarrito = uniqid();
        $this->CarritoModel->InsertCarrito($idcarrito, $numero_documento);
        // Aquí deberías guardar los productos del carrito en otra tabla (detalle de compra)
        unset($_SESSION['carrito']);
        header("Location: index.php?action=compraExitosa");
        exit;
    }
}
