<?php
require_once './model/ProductoModel.php';
require_once './config/database.php';

class ProductoController
{
    private $db;
    private $ProductoModel;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->ProductoModel = new ProductoModel($this->db);
    }

    public function InsertProducto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $IdCategoria = $_POST['IdCategoria'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $foto = $_FILES['foto']['name'];
            $target_dir = "photo/";
            $target_file = $target_dir . basename($foto);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];

            $productos = $this->ProductoModel->InsertProducto($IdCategoria, $descripcion, $precio, $foto, $nombre, $cantidad);
            header("Location: index.php?action=InverBoard");
        }
    }
    public function getNextCodigo()
    {
        return $this->ProductoModel->getNextCodigo();
    }
    public function listProducto()
    {
        return $this->ProductoModel->getProductoWithCategoria();
    }
    public function ProductoByCodigo()
    {
        $codigo = $_GET['codigo'] ?? '';
        return $this->ProductoModel->ProductoByCodigoWithCategoria($codigo);
    }
    public function Actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $IdCategoria = $_POST['IdCategoria'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $foto = $_FILES['foto']['name'] ? $_FILES['foto']['name'] : null;
            if ($foto) {
                $target_dir = "photo/";
                $target_file = $target_dir . basename($foto);
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            } else {
                $foto = $_POST['foto_actual'];
            }
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $codigo = $_POST['codigo'];

            $this->ProductoModel->Actualizar($IdCategoria, $descripcion, $precio, $foto, $nombre, $cantidad, $codigo);
        }
    }

    public function Eliminar()
    {
        $codigo = $_GET['codigo'] ?? '';
        $datos = $this->ProductoModel->Eliminar($codigo);
        return $this->ProductoModel->Eliminar($codigo);
    }
    //PRUEBA DE MUESTRA DE PRODUCTOS CREADOS:
    public function getProducto()
    {
        $productos = $this->ProductoModel->getProducto();
        include './views/InverBoard.php'; // vista principal (inverboard)
    }

    public function BarraBusqueda()
    {
        $nombre = $_GET['nombre'] ?? '';
        return $this->ProductoModel->BarraBusquedaWithCategoria($nombre);
    }

    // Método para filtrar productos por categoría
    public function ProductoByCategoria($IdCategoria)
    {
        return $this->ProductoModel->getProductoByCategoria($IdCategoria);
    }

    public function obtenerComentarios($codigo)
    {
        require_once './model/ComentarioModel.php';
        $comentarioModel = new ComentarioModel($this->db);
        return $comentarioModel->obtenerComentariosPorProducto($codigo);
    }

    public function guardarComentario($codigo, $numero_documento, $comentario)
    {
        require_once './model/ComentarioModel.php';
        $comentarioModel = new ComentarioModel($this->db);
        $comentarioModel->insertarComentario($codigo, $numero_documento, $comentario);
    }
}
