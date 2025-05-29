<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="shortcut icon" href="/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/productinfo.css">
    <link rel="" href="js/productinfo.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container-fluid" id="cajamadre">
        <div class="row">
            <div class="col-md-3 p-1">
                <div class="d-flex">
                    <nav class="navbar-expand">
                        <ul class="navbar-nav">
                            <form action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
                                <a href=""><button type="submit" value="InverBoard" class="btn btn-light text-danger h-100 ">Inicio</button></a>
                            </form>
                            <li class="nav-item dropdown">
                                <!-- Menú dinámico de categorías -->
                                <form method="get" action="index.php?action=verCategoria">
                                    <input type="hidden" name="action" value="verCategoria">
                                    <select name="IdCategoria" class="form-select ms-1 w-75" onchange="this.form.submit()">
                                        <option value="">Categorías</option>
                                        <option value="1">Cuidado del hogar</option>
                                        <option value="2">Cocina</option>
                                        <option value="3">Accesorios para electrodomesticos</option>
                                        <option value="4">Cuidado personal</option>
                                    </select>
                                </form>
                                <!-- Fin menú dinámico de categorías -->
                            </li>
                    </nav>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="row">
                    <form action="index.php?action=barraBusqueda" method="get" class="d-flex">
                        <input type="hidden" name="action" value="barraBusqueda">
                        <input class="form-control mx-5 me-2" name="nombre" type="text" placeholder="Buscar Productos">
                        <button class="btn btn-outline-light me-5" type="submit">Buscar</button>
                    </form>
                </div>
            </div>

            <!--iniciar sesion, registrarse-->
            <div id="regis" class="col-md-4 p-1">
                <form action="index.php?action=login" method="GET">
                    <button type="submit" name="action" value="login" class="btn btn-light h-100">Iniciar sesión</button>
                </form>
                <form action="index.php?action=insertUser" method="GET">
                    <button type="submit" name="action" value="insertUser" class="btn btn-light ms-1 text-danger h-100">Registrarse</button>
                </form>
            </div>
            <!--iniciar sesion, registrarse-->

            

        </div>

    </div>
    <!--Botones del admin-->
            <div class="col-md-3 p-1">
                <label for="">Productos</label>
                <form action="index.php?action=insertproducto" method="GET">
                    <button class="btn btn-danger" type="submit" name="action" value="insertproducto">Insertar Productos</button>
                </form>

                <form action="index.php?action=listProducto" method="GET">
                    <button class="btn btn-danger" type="submit" name="action" value="listProducto">Consultar Productos</button>
                </form>


                <label for="">Usuarios</label>
                <form action="index.php?action=insertUser" method="GET">
                    <button class="btn btn-outline-danger" type="submmit" name="action" value="insertUser">Insertar Usuario</button>
                </form>

                <form action="index.php?action=listUsers" method="GET">
                    <button class="btn btn-outline-danger" type="submit" name="action" value="listUsers">Consultar Usuarios</button>
                </form>
                <form action="index.php?action=searchUserByNumDocum" method="GET">
                    <button class="btn btn-outline-danger" type="submit" name="action" value="searchUserByNumDocum">Consultar usuario por ID</button>
                </form>
                <form action="index.php?action=openForm" method="GET">
                    <button class="btn btn-outline-danger" type="submit" name="action" value="openForm">Actualizar usuario</button>
                </form>
                <form action="index.php?action=openFormDelete" method="GET">
                    <button class="btn btn-outline-danger" type="submit" name="action" value="openFormDelete">Eliminar usuario</button>
                </form>
                <form action="index.php?action=login" method="GET">
                    <button class="btn btn-outline-danger" type="submit" name="action" value="login">Inicio sesión usuario</button>
                </form>
            </div>
            <!--Botones del admin-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>