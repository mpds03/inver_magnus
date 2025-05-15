<?php
require_once './model/ProductoModel.php';
require_once './config/database.php';

class ProductoController{
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
            $IdCategoria =$_POST['IdCategoria'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $foto = $_FILES['foto']['name'];
            $target_dir = "photo/";
            $target_file = $target_dir . basename($foto);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];

            $this->ProductoModel->InsertProducto($IdCategoria,$descripcion, $precio, $foto, $nombre, $cantidad);
            header("Location: index.php?action=InverBoard");
        }
    }
    public function getNextCodigo()
    {
        return $this->ProductoModel->getNextCodigo();
    }
    public function listProducto()
    {
        return $this->ProductoModel->getProducto();
    }
    public function ProductoByCodigo()
    {
        $codigo = $_GET['codigo'] ?? '';
        return $this->ProductoModel->ProductoByCodigo($codigo);
    }
    public function Actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $IdCategoria =$_POST['IdCategoria'];
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
            $cantidad= $_POST['cantidad'];
            $codigo = $_POST['codigo'];

            $this->ProductoModel->Actualizar($IdCategoria,$descripcion, $precio, $foto, $nombre, $cantidad, $codigo);
        }
    }

    public function Eliminar(){
        $codigo=$_GET['codigo'] ?? '';
        $datos= $this->ProductoModel->Eliminar($codigo);
        return $this->ProductoModel->Eliminar($codigo);
    }
}