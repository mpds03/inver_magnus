<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Busqueda</title>
    <!-- Icono y estilos -->
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/productinfo.css">
       <link rel="" href="js/productinfo.js">
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
    endif; ?>


<div class="container-fluid" id="cajamadre">
    <div class="row">
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
        <div id="regis" class="col-md-4 p-1 d-flex justify-content-end align-items-center">
            <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 0 || $_SESSION['rol'] === 1)): ?>
                <div class="d-flex flex-column align-items-end me-3">
                    <span class="text-light fw-bold" style="font-size: 1rem;">Bienvenid@</span>
                    <span class="text-light fw-bold" style="font-size: 1rem;">
                        <?= htmlspecialchars($_SESSION['cliente']['nombres']) . " " . htmlspecialchars($_SESSION['cliente']['apellidos']); ?> 
                    </span>
                </div>
                <!-- Botón para ver el carrito del usuario -->
                <form action="index.php?action=verCarrito" method="POST" class="me-2 mb-0">
                    <button type="submit" class="btn btn-light text-danger h-100">
                        <i class="fas fa-shopping-cart"></i>
                        Carrito
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
 </div>
  </div>

    <div class="container-fluid" id="detallesproducto">
        <!--AQUI VA LOS DETALLES DEL PRODUCTO Y ESO-->
        <div class="container-fluid">
            <div class="row">
                <!--cajita del lado izquierdo-->
                <div class="col-md-6 p-4 bg-light rounded shadow"><!--"Section"-->
                    <?php foreach ($Productos as $producto): ?>
                        <p class="text-uppercase fw-bold text-center text-secondary"><?php echo $producto['categoria_nombre']; ?></p>
                        </p><!--toca seguir modificando pero aja-->

                        <h2 class="text-center"><?php echo $producto['nombre']; ?></h2>
                        <img src="photo/<?= $producto['foto'] ?>" alt="Imagen producto" class="img-fluid d-block mx-auto">

                        <!-- Botones Descripción/Detalles -->
                        <div class="text-start mt-3">
                            <h5 class="text-danger">Descripción</h5>
                            <p><?php echo $producto['descripcion']; ?></p>

                            <div class="col-6">

                            </div>
                        </div>

                        <!-- Añadir al carrito -->
                        <div class="text-center mt-4">
                            <!-- Formulario para añadir al carrito -->
                            <form action="index.php?action=agregarCarrito" method="post" class="d-inline ms-2">
                                <input type="hidden" name="codigo" value="<?= $producto['codigo'] ?>">
                                <input type="hidden" name="precioUnitario" value="<?= $producto['precio'] ?>">
                                <input type="number" name="cantidad" value="1" min="1" max="<?= $producto['cantidad'] ?>" class="form-control d-inline w-auto mb-2" required><br>
                                <button type="submit" class="btn btn-danger">Añadir al carrito</button>
                            </form>
                        </div>
                </div>

                <!--Hola, cajita del lado derecho-->
                <div class="col-md-6 p-4 bg-white rounded shadow"><!--"Section2"-->
                    <h1 class="text-start">$<?= number_format($producto['precio'], 0, '', '.') ?></h1>
                <?php endforeach; ?><!--aca termina el foreach de conexion base de datos-->
                <h5 class="text-start">Opiniones del producto</h5>

                <!--Estrellas-->
                <p class="text-start">Calificación:</p>
                <div class="stars text-start mt-2" id="stars">
                    <span data-value="1">★</span>
                    <span data-value="2">★</span>
                    <span data-value="3">★</span>
                    <span data-value="4">★</span>
                    <span data-value="5">★</span>
                </div>
                <!--Estrellas-->

                <!--Comentarios de usuarios-->
                <?php if (isset($_SESSION['cliente'])): ?>
                    <form action="index.php?action=comentarProducto" method="post">
                        <input type="hidden" name="codigo" value="<?= $producto['codigo'] ?>">
                        <div class="mb-3">
                            <label for="comentario" class="form-label">Tu comentario</label>
                            <textarea name="comentario" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Enviar comentario</button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">Debes <a href="index.php?action=login">Iniciar sesión</a> para comentar
                    </div>
                <?php endif; ?>
                <!--Comentarios de usuarios-->

                <!-- Mostrar comentarios existentes -->
                <div class="mt-4">
                    <h6>Comentarios de otros usuarios:</h6>
                    <?php if (!empty($Comentarios)): ?>
                        <?php foreach ($Comentarios as $comentario): ?>
                            <div class="border rounded p-2 mb-2">
                                <strong><?= htmlspecialchars($comentario['nombres']) ?></strong>
                                <span class="text-muted" style="font-size:0.9em;"><?= htmlspecialchars($comentario['fecha']) ?></span>
                                <p class="mb-0"><?= htmlspecialchars($comentario['comentario']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Aún no hay comentarios para este producto.</p>
                    <?php endif; ?>
                </div>

                </div>
                <!--Hola, cajita del lado derecho-->
            </div>
        </div>

    </div>

    <!--footer-->
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
    <!--footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>