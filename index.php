    <?php

    require_once './controller/ProductoController.php';
    require_once './controller/clientecontroller.php';
    require_once './controller/TipDocumController.php';
    require_once './controller/categoriacontroller.php';

    $ProductoController= new ProductoController(); //Insertar, Actualizar, Eliminar, Listar productos
    $CategoriaController = new CategoriaController();
    $clientecontroller = new clientecontroller();
    $TipDocumController= new TipDocumController();

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
                        
                        case 'buscar':
                            $Productos= $ProductoController->ProductoByCodigo();
                            $Categorias = $CategoriaController->listCategoria();
                            include './views/actualizar.php';
                            break;

            case 'actualizar':
                $Productos=$ProductoController->Actualizar();
                
                include './views/InverBoard.php';
                break;

                case 'delete':
                    $Productos = $ProductoController->ProductoByCodigo();
                    include './views/delete_producto_by_codigo.php';
                    break;
        case 'eliminar':
            $Productos= $ProductoController->Eliminar();
            include './views/InverBoard.php';
            break;
//Hasta aca llega todo lo de productos

case 'insertUser':
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cliente=$clientecontroller->insertUser();

    }else{
        $docums = $TipDocumController->listTipDocum();
        include './views/registro.php';
    }
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

        default:
            include './views/InverBoard.php';
            break;
    }