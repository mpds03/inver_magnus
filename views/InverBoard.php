<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inverboard.css">
</head>

<body>
    <div class="container-fluid" id="cajamadre">
        <div class="row">
            <div class="col-md-3 p-1">
                <div class="d-flex">
                    <nav class="navbar-expand">
                        <ul class="navbar-nav">
                            <a href="#"><button type="submit" class="btn btn-light text-danger h-100 ">Inicio</button></a>
                            <li class="nav-item dropdown">
                                <button class="nav-link dropdown-toggle btn btn-light text-dark ms-1" href="#" role="button" data-bs-toggle="dropdown" aria-expand="false">Electrodomesticos</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Cuidado del hogar</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Cocina</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Accesorios para electrodomesticos</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Cuidado personal</a></li>
                                </ul>
                            </li>
                    </nav>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="row">
                    <form class="d-flex" role="search">
                        <input class="form-control mx-5 me-2" type="search" placeholder="..." aria-label="Search">
                        <button class="btn btn-outline-light me-5" type="submit">Buscar</button>
                    </form>
                </div>
            </div>

            <!--iniciar sesion, registrarse-->
            <div id="regis" class="col-md-4 p-1">
                <a href="ejem.html"><button type="submit" class="btn btn-light h-100">Iniciar sesión</button></a>

                <a href="ejem.html"><button type="submit" class="btn btn-light ms-1 text-danger h-100">Registrarse</button></a>

            </div>
            <!--iniciar sesion, registrarse-->

            <div class="col-md-5 p-1" id="cajamadre">
                <div class="row">
                    <!--titulo1 de top articulos mas vendidos-->
                    <div class="text-center" id="titulo1">
                        <div class="text-light ">
                            <p>TOP 3 PRODUCTOS <br>
                                MAS VENDIDOS</p>
                        </div>
                        <div class="col-md-3 p-1">
                            <img id="licu" class="img-fluid" src="/photo/licubatiplancha.png" alt="">
                        </div>
                    </div>


                    <!--Lista de productos mas vendidos:-->
                    <div class="position-relative" id="bati-container">
                        <div id="bati" class="d-flex flex-row align-items-center">
                            <button class="btn btn-light text-danger my-5 ">Licuadoras</button>
                            <button class="btn btn-light text-danger my-5">Batidora de mano</button>
                            <button class="btn btn-light text-danger my-5">Plachas</button>
                        </div>
                    </div>
                    <!--Lista de productos mas vendidos.-->

                </div>
            </div>


            <!-- CARDS -->
            <div class="row row-cols-1 row-cols-md-5 g-4 mx-5 mt-3">

                <!--CARD CONECTADA A LA DATABASE-->
                <?php foreach ($Productos as $producto): ?>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="photo/<?= $producto['foto'] ?>" class="card-img-top estructura" alt="Imagen del producto">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                <p class="card-text"><?php echo $producto['precio'] ?></p>
                                <a href="#" class="btn btn-danger">Mirar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--CARD CONECTADA A LA DATABASE-->

            </div><!--fin del div de row de cards-->

                    <label for="">Productos</label>
    <form action="index.php?action=insertproducto" method="GET">
    <button  type="submit" name="action" value="insertproducto">Insertar Productos</button>
    </form>


    <form action="index.php?action=listProducto" method="GET">
    <button type="submit" name="action" value="listProducto">Consultar Productos</button>
    </form>
    

    <form action="index.php?action=listproductoporcodigo" method="GET">
    <button type="submit" name="action" value="listproductoporcodigo">Actualizar Productos</button>
    </form>

     <form action="index.php?action=deleteProducto" method="GET">
    <button type="submit" name="action" value="deleteProducto">Eliminar Productos</button>
    </form>

    <label for="">Usuarios</label>
    <form action="index.php?action=insertUser" method="GET">
    <button type="submmit" name="action" value="insertUser">Insertar Usuario</button>
    </form>

    <form action="index.php?action=listUsers" method="GET">
            <button type="submit" name="action" value="listUsers">Consultar Usuario</button>
        </form>
        <form action="index.php?action=searchUserByNumDocum" method="GET">
            <button type="submit" name="action" value="searchUserByNumDocum">Consultar </button>
        </form>
        <form action="index.php?action=openForm" method="GET">
            <button type="submit" name="action" value="openForm"> actualizar usuario</button>
        </form>
        <form action="index.php?action=openFormDelete" method="GET">
            <button type="submit" name="action" value="openFormDelete"> eliminar</button>
        </form>

        </div>
    </div>
    </div> <!-- CARDS -->

    </div> <!-- fin de row de caja madre-->
    </div> <!-- fin de caja madre-->

    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>