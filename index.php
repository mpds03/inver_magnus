<?php

require_once './controller/ProductoController.php';
require_once './controller/clientecontroller.php';
require_once './controller/TipDocumController.php';
require_once './controller/categoriacontroller.php';
require_once './controller/CarritoController.php'; 
require_once './controller/FacturaController.php'; 


$ProductoController = new ProductoController(); //Insertar, Actualizar, Eliminar, Listar productos
$CategoriaController = new CategoriaController();
$clientecontroller = new clientecontroller();
$TipDocumController = new TipDocumController();
$CarritoController = new CarritoController(); 
$FacturaController = new FacturaController(); 


$action = $_GET['action'] ?? 'InverBoard';

switch ($action) {
    //Todo lo que tiene que ver con productos
    case 'insertproducto':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Productos = $ProductoController->InsertProducto();
        } else {
            $codigo_siguiente = $ProductoController->getNextCodigo();
            $Categorias = $CategoriaController->listCategoria();
            include './views/regisproducto.php';
        }
        break;

    case 'listProducto':
        $Productos = $ProductoController->listProducto();
        include './views/list_producto.php';
        break;

    case 'listproductoporcodigo':
        $Productos = $ProductoController->ProductoByCodigo();
        include './views/list_producto_by_codigo.php';
        break;

    case 'buscarProducto':
        $Productos = $ProductoController->ProductoByCodigo();
        $Categorias = $CategoriaController->listCategoria();
        include './views/actualizarProducto.php';
        break; //Este es el que me lleva al producto buscado por codigo

    case 'actualizarProducto':
        $Productos = $ProductoController->Actualizar();
        $Productos = $ProductoController->listProducto();
        include './views/list_producto.php';
        break;

    case 'cambiarEstadoProducto':
        $ProductoController->cambiarEstadoProducto();
        header('Location: index.php?action=listProducto');
        exit;

    case 'deleteProducto':
        $Productos = $ProductoController->ProductoByCodigo();
        include './views/delete_producto_by_codigo.php';
        break;
    case 'eliminarProducto':
        $Productos = $ProductoController->Eliminar();
        $Productos = $ProductoController->listProducto();
        include './views/InverBoard.php';

        break;

    case 'barraBusqueda':
        $Productos = $ProductoController->BarraBusqueda();
        $Categorias = $CategoriaController->listCategoria();
        include './views/barraBusqueda.php';
        break; //Este es el que me lleva al producto buscado por codigo
    //Hasta aca llega todo lo de productos

    // Todo lo que tiene que ver con usuario
    case 'insertUser':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cliente = $clientecontroller->insertUser();
        } else {
            $docums = $TipDocumController->listTipDocum();
            include './views/registro.php';
        }
        break;

    case 'listUsers':
        $clientes = $clientecontroller->listUsers();
        include './views/list_users.php';
        // if ($_SESSION["rol"] == "admin") {
        //     $users = $userController->listUsers();
        //     include './views/list_users.php';
        // }
        break;
    case 'searchUserByNumDocum':
        $clientes = $clientecontroller->UserByNumDocum();
        include './views/list_NumDocum.php';
        break;
    case 'openForm':
        $clientes = $clientecontroller->listUsers();
        include './views/list_By_NumDocum.php';
        break;
    case 'searchClienteXNumDocum':
        $clientes = $clientecontroller->UserByNumDocum();
        $docums = $TipDocumController->listTipDocum();
        include './views/update_cliente.php';
        break;
    case 'actualizarUser':
        $clientes = $clientecontroller->actualizar();
        $clientes = $clientecontroller->listUsers();
        include './views/InverBoard.php';
        break;
    case 'openFormDelete':
        $clientes = $clientecontroller->listUsers();
        include './views/delete_NumDocum.php';
        break;
    case 'eliminarUser':
        $clientes = $clientecontroller->eliminar();
        include './views/InverBoard.php';
        break;

    //caso de vista productinfo:
    case 'productinfo':
        $Productos = $ProductoController->ProductoByCodigo();
        $Categorias = $CategoriaController->listCategoria();
        // Obtener comentarios del producto
        $codigo = $_GET['codigo'];
        $Comentarios = $ProductoController->obtenerComentarios($codigo);
        include './views/productinfo.php';
        break;

    // Mostrar productos por categoría en categorias.php
    case 'verCategoria':
        $IdCategoria = $_GET['IdCategoria'] ?? '';
        $Productos = [];
        if ($IdCategoria !== '') {
            $Productos = $ProductoController->ProductoByCategoria($IdCategoria);
        }
        $Categorias = $CategoriaController->listCategoria();
        include './views/categorias.php';
        break;

    // mostrar vista de administrador:
    case 'AdminVista':
        // if ($_SESSION["rol"] == "admin") {
        //  $Productos = $ProductoController->listProducto();
        include './views/AdminVista.php';
        //} else {
        // header("Location: index.php?action=InverBoard");
        // }
        break; //tengo comentado lo de el if porque aun no hacemos lo de inicio de sesion completo uwu

    case 'login':
        $cliente = $clientecontroller->login(); // Método que valida el acceso
        include './views/login.php';
        break;

    case 'logout':
        $cliente = $clientecontroller->logout();
        include './views/InverBoard.php';
        break;

    

    // --- CARRITO DE COMPRAS ---
    case 'verCarrito':
        // Muestra el carrito del usuario
        $CarritoController->ver();
        break;
    case 'agregarCarrito':
        $CarritoController->agregar();
        break;
    case 'eliminarDelCarrito':
        $CarritoController->eliminarProducto();
        break;
    case 'vaciarCarrito':
        $CarritoController->vaciar();
        break;

    // --- FACTURA ---
    case 'generarFactura':
        session_start();
        $numero_documento = $_SESSION['cliente']['numero_documento'] ?? null;

        // Obtener el carrito y los productos del carrito usando métodos públicos
        $carrito = $CarritoController->obtenerCarritoPorDocumento($numero_documento);
        $productos = [];
        if ($carrito) {
            $productos = $CarritoController->obtenerProductosPorCarrito($carrito['idcarrito']);
        }

        // Generar la factura (debes modificar tu FacturaController para que retorne los datos)
        $facturaData = $FacturaController->generar($productos, $numero_documento);

        // $facturaData debe ser un array con ['factura' => ..., 'detalles' => ...]
        $factura = $facturaData['factura'];
        $detalles = $facturaData['detalles'];

        include './views/factura.php';
        break;

    
        
    case 'actualizarEstadoFactura':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['IdFactura'];
            $nuevo_estado = $_POST['nuevo_estado'];
            require_once './model/FacturaModel.php';
            $facturaModel = new FacturaModel((new Database())->getConnection());
            $facturaModel->actualizarEstado($id, $nuevo_estado);
        }
        header('Location: index.php?action=adminPedidos');
        exit;

    
    case 'eliminarFactura':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['IdFactura'];
            require_once './model/FacturaModel.php';
            $facturaModel = new FacturaModel((new Database())->getConnection());
            $facturaModel->eliminarFactura($id);
        }
        header('Location: index.php?action=adminPedidos');
        exit;


    case 'comentarProducto':
        session_start();
        if (!isset($_SESSION['cliente'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $numero_documento = $_SESSION['cliente']['numero_documento'];
        $codigo = $_POST['codigo'];
        $comentario = $_POST['comentario'];
        // Aquí deberías guardar el comentario en la base de datos
        $ProductoController->guardarComentario($codigo, $numero_documento, $comentario);
        header("Location: index.php?action=productinfo&codigo=$codigo");
        exit;
        // --- RECUPERACION DE CONTRASEÑA ---
    case 'recuperarContraseña':
        include './views/recuperar_contraseña.php';
        break;
    case 'enviarCodigoRecuperacion':
        $clientecontroller->enviarCodigoRecuperacion();
        break;
    case 'verificarCodigo':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $clientecontroller->verificarCodigo();
        } else {
            include './views/verificar_codigo.php';
        }
        break;
    case 'cambiarContraseña':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $clientecontroller->cambiarContraseña();
        } else {
            include './views/cambiar_contraseña.php';
        }
        break;

    //NO TOCAR:
    default:
        // Obtener productos más vendidos
        $topProductos = $ProductoController->getTopVendidos(3);
        $Productos = $ProductoController->listProducto();
        include './views/InverBoard.php';
        break;
}
