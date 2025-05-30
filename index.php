<?php

    require_once './controller/ProductoController.php';
    require_once './controller/clientecontroller.php';
    require_once './controller/TipDocumController.php';
    require_once './controller/categoriacontroller.php';
    require_once './controller/CompraDirectaController.php';

    $ProductoController = new ProductoController(); //Insertar, Actualizar, Eliminar, Listar productos
    $CategoriaController = new CategoriaController();
    $clientecontroller = new clientecontroller();
    $TipDocumController = new TipDocumController();
    $CompraDirectaController = new CompraDirectaController();

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
            break;//Este es el que me lleva al producto buscado por codigo

        case 'actualizarProducto':
            $Productos = $ProductoController->Actualizar();
            $Productos = $ProductoController->listProducto();
            include './views/InverBoard.php';
            break;

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
            break;//Este es el que me lleva al producto buscado por codigo
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


        // case 'login':
        //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //         $cliente = $clientecontroller->Login();
        //     }else {
        //       $cliente= $clientecontroller->Login();
        //       $docums = $TipDocumController->listTipDocum();
        //       include './views/iniciosesion.php';
        //     }
        //     break;

        //     case 'inverBoard':
        //         include './views/InverBoard.php';
        //         break;

        //caso de vista productinfo:
        case 'productinfo':
            $Productos = $ProductoController->ProductoByCodigo();
            $Categorias = $CategoriaController->listCategoria();
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
            break;


        //todo lo de compra directa:
        case 'HacerCompra':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $idcompra = $CompraDirectaController->HacerCompra();
                include './views/CompraDirecta.php';
            }
            break;
         case 'login':
        $cliente=$clientecontroller->login(); // Método que valida el acceso
        include './views/login.php';
        break;


    case 'logout':
    $cliente=$clientecontroller->logout();
    include './views/InverBoard.php';
    break;



        default:
            $Productos = $ProductoController->listProducto();
            include './views/InverBoard.php';
            break;
    }
