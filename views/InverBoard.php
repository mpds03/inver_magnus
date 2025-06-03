<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Icono y estilos -->
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inverboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>

    <?php
    // Iniciar sesión y mostrar bienvenida si el usuario está logueado
    session_start();
    if (isset($_SESSION['cliente'])):
        $nombre = htmlspecialchars($_SESSION['cliente']['nombres']);
        $apellidos = htmlspecialchars($_SESSION['cliente']['apellidos']);
        $numero_documento = htmlspecialchars($_SESSION['cliente']['numero_documento']);
    ?>
        <div class="container-fluid bg-danger text-light text-center p-3">
            <h4>Bienvenid@, <?php echo $nombre, " ", $apellidos; ?> 👋</h4>
        </div>
    <?php endif; ?>


<div class="container-fluid" id="cajamadre">
     <div class="container-fluid" id="cajamadre">
        <div class="row align-items-center">
            <!-- Botón Hamburguesa y Categorías -->
            <div class="col-md-3 d-flex align-items-center gap-2">
                <!-- Botón Hamburguesa para abrir Offcanvas -->
                <button class="btn btn-light me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral" aria-controls="menuLateral" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Categorías -->
                <form method="get" action="index.php?action=verCategoria">
                  <input type="hidden" name="action" value="verCategoria" />
                  <select name="IdCategoria" class="form-select w-75" onchange="this.form.submit()">
                    <option value="">Categorías</option>
                    <option value="1">Cuidado del hogar</option>
                    <option value="2">Cocina</option>
                    <option value="3">Accesorios para electrodomésticos</option>
                    <option value="4">Cuidado personal</option>
                  </select>
                </form>
            </div>

            <!-- Barra de búsqueda -->
            <div class="col-md-5 p-1">
                <form action="index.php?action=barraBusqueda" method="get" class="d-flex">
                  <input type="hidden" name="action" value="barraBusqueda" />
                  <input class="form-control mx-5 me-2" name="nombre" type="text" placeholder="Buscar Productos" />
                  <button class="btn btn-outline-light me-5" type="submit">Buscar</button>
                </form>
            </div>

            <?php
            // Determinar si el usuario está logeado
            $logeado = isset($_SESSION['cliente']);
            ?>
            <?php if (!$logeado): ?>
            <div id="regis" class="col-md-4 p-1 d-flex justify-content-end">
                <!-- Botón para ver el carrito del usuario -->
                <form action="index.php?action=login" method="GET" class="me-2">
                    <button type="submit" name="action" value="login" class="btn btn-light text-black h-100">Iniciar Sesion</button>
                </form>
                <form action="index.php?action=insertUser" method="GET" class="">
                    <button type="submit" name="action" value="insertUser" class="btn btn-light text-danger h-100 ">Registrase</button>
                </form>
            </div>
            <?php endif; ?>

          <!-- Control de sesión: actualizar datos, cerrar sesión, login, registro -->
            <div id="regis" class="col-md-4 p-1 d-flex justify-content-end">
                <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 0 || $_SESSION['rol'] === 1)): ?>
                    <!-- Botón para ver el carrito del usuario -->
                    <form action="index.php?action=verCarrito" method="POST" class="me-2">
                        <button type="submit" class="btn btn-light text-danger h-100 ">
                            Carrito (<?= $_SESSION['rol'] === 1 ? 'Admin' : 'Usuario' ?>)
                        </button>
                    </form>
                <?php endif; ?>
            </div>

      <!-- Offcanvas menú lateral -->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="menuLateral" aria-labelledby="menuLateralLabel">
        <div class="offcanvas-header">
          <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 1)): ?>
          <h5 class="offcanvas-title" id="menuLateralLabel">Administrador</h5>
          <?php elseif (isset($_SESSION['rol']) && ($_SESSION['rol'] === 0)): ?>
          <h5 class="offcanvas-title" id="menuLateralLabel">Usuario</h5>
          <?php else: ?>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
          <?php endif; ?>
        </div>
        <div class="offcanvas-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <form action="index.php?action=InverBoard" method="post" class="mb-0">
                <button type="submit" value="InverBoard" class="btn btn-light ">Inicio</button>
              </form>
            </li>
            <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 0 || $_SESSION['rol'] === 1)): ?>
            <li class="list-group-item"><form action="index.php" method="GET" >
                        <input type="hidden" name="action" value="searchClienteXNumDocum">
                        <input type="hidden" name="numero_documento" value="<?= $numero_documento ?>">
                        <button type="submit" class="btn btn-light  h-100">Actualizar Datos</button></form></li>
                        
    
            <li class="list-group-item"><form action="index.php?action=logout" method="post" class="mb-0">
                <button type="submit" value="logout" class="btn btn-light ">Cerrar Sesion</button>
              </form></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 1)): ?>
            <li class="list-group-item"><form action="index.php?action=listUsers" method="post" class="mb-0">
                <button type="submit" value="listUsers" class="btn btn-light ">Usuarios</button>
              </form></li>
            <li class="list-group-item"><form action="index.php?action=adminPedidos" method="post" class="mb-0">
                <button type="submit" value="adminPedidos" class="btn btn-light ">Ver Pedidos</button>
              </form></li>
            <li class="list-group-item"><form action="index.php?action=listProducto" method="post" class="mb-0">
                <button type="submit" value="InverBoard" class="btn btn-light ">Productos</button>
              </form></li>
            <?php endif; ?>
            <!-- Agrega aquí más módulos si quieres -->
          </ul>
        </div>
      </div>

            <!-- Columna central: productos destacados y cards -->
            <div class="col-md-5 p-1" id="cajamadre">
                <div class="row">
                    <!-- Título de top productos más vendidos -->
                    <div class="text-center" id="titulo1">
                        <div class="text-light ">
                            <p>TOP 3 PRODUCTOS <br>
                                MAS VENDIDOS</p>
                        </div>
                        <div class="col-md-3 p-1">
                            <img id="licu" class="img-fluid" src="/photo/licubatiplancha.png" alt="">
                        </div>
                    </div>

                <!-- Lista de productos más vendidos (botones) -->
                <div class="position-relative" id="bati-container">
                    <div id="bati" class="d-flex flex-row align-items-center">
                        <button class="btn btn-light text-danger my-5 ">Licuadoras</button>
                        <button class="btn btn-light text-danger my-5">Batidora de mano</button>
                        <button class="btn btn-light text-danger my-5">Plachas</button>
                    </div>
                </div>
                <!-- Fin lista de productos más vendidos -->
            </div>
        </div>
<!-- Mensaje de éxito al realizar una compra -->
<?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'compra_exitosa'): ?>
    <div class="alert alert-success text-center">¡Compra hecha con éxito!</div>
<?php endif; ?>
        <!-- Cards de productos (conexión a la base de datos) -->
        <div class="row row-cols-1 row-cols-md-5 mt-3">
            
            <!-- Verifica si hay productos para mostrar -->
            <?php if (!empty($Productos) && is_array($Productos)): ?>
                <?php foreach ($Productos as $producto): ?>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <!-- Imagen del producto -->
                            <img src="photo/<?= $producto['foto'] ?>" class="card-img-top estructura" alt="Imagen del producto">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p class="card-text text-muted"><?php echo $producto['categoria_nombre']; ?></p>
                                
                                <h4 class="card-text">$<?= number_format($producto['precio'], 0, '', '.') ?></h4>
                                <!-- Botón para ver más información del producto -->
                                <a href="index.php?action=productinfo&codigo=<?= $producto['codigo'] ?>" class="btn btn-danger">Mirar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Producto actualizado con exito</p>
            <?php endif; ?>
            <!-- Fin cards de productos -->
        </div><!--fin del div de row de cards-->

        <!-- Footer con botones de redes sociales -->
        <div class="container-fluid footer bg-secondary">
            <div class="row">
                <div class="col-12 p-3 mt-2 text-center">
                    <button class="btn btn-outline-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg></button>
                    <button class="btn btn-outline-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg></button>
                </div>
            </div>
        </div>
        <!-- Fin footer -->

        <!-- Botones de administración de productos y usuarios -->
        <div class="container my-4">
    <div class="row">
        <!-- Productos 
        <div class="col-12 col-md-6 mb-4">
            <label class="fw-bold mb-2">Productos</label>
            <div class="d-grid gap-2">
                <form action="index.php?action=insertproducto" method="GET">
                    <button class="btn btn-danger w-100 mb-2" type="submit" name="action" value="insertproducto">Insertar Productos</button>
                </form>
                <form action="index.php?action=listProducto" method="GET">
                    <button class="btn btn-danger w-100 mb-2" type="submit" name="action" value="listProducto">Consultar Productos</button>
                </form>
                <form action="index.php?action=listproductoporcodigo" method="GET">
                    <button class="btn btn-danger w-100 mb-2" type="submit" name="action" value="listproductoporcodigo">Actualizar Productos</button>
                </form>
                <form action="index.php?action=deleteProducto" method="GET">
                    <button class="btn btn-danger w-100" type="submit" name="action" value="deleteProducto">Eliminar Productos</button>
                </form>
            </div>
        </div>   AAAAAAAAA-->
        <!-- Usuarios 
        <div class="col-12 col-md-6 mb-4">
            <label class="fw-bold mb-2">Usuarios</label>
            <div class="d-grid gap-2">
                <form action="index.php?action=insertUser" method="GET">
                    <button class="btn btn-outline-danger w-100 mb-2" type="submit" name="action" value="insertUser">Insertar Usuario</button>
                </form>
                <form action="index.php?action=listUsers" method="GET">
                    <button class="btn btn-outline-danger w-100 mb-2" type="submit" name="action" value="listUsers">Consultar Usuarios</button>
                </form>
                <form action="index.php?action=searchUserByNumDocum" method="GET">
                    <button class="btn btn-outline-danger w-100 mb-2" type="submit" name="action" value="searchUserByNumDocum">Consultar usuario por ID</button>
                </form>
                <form action="index.php?action=openForm" method="GET">
                    <button class="btn btn-outline-danger w-100 mb-2" type="submit" name="action" value="openForm">Actualizar usuario</button>
                </form>
                <form action="index.php?action=openFormDelete" method="GET">
                    <button class="btn btn-outline-danger w-100 mb-2" type="submit" name="action" value="openFormDelete">Eliminar usuario</button>
                </form>
                <form action="index.php?action=login" method="GET">
                    <button class="btn btn-outline-danger w-100 mb-2" type="submit" name="action" value="login">Inicio sesión usuario</button>
                </form>
                <form action="index.php?action=AdminVista" method="GET">
                    <button class="btn btn-danger w-100" type="submit" name="action" value="AdminVista">Admin</button>
                </form>
            </div>
        </div>AAAAAAAA-->
    </div>
</div>
    </div> <!-- CARDS -->

    </div> <!-- fin de row de caja madre-->
    </div> <!-- fin de caja madre-->

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>