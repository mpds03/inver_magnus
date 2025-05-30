<?php
session_start();

// Verificar si está logueado
if (!isset($_SESSION['cliente'])) {
    header("Location: index.php?action=login");
    exit;
}

$nombre = htmlspecialchars($_SESSION['cliente']['nombres']);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle producto</title>
    <link rel="shortcut icon" href="/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/productinfo.css">
    <link rel="" href="js/productinfo.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--esto no se pa que es-->
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
                     <form action="index.php?action=barraBusqueda" method="get" class="d-flex" >
                        <input type="hidden" name="action" value="barraBusqueda">
                        <input class="form-control mx-5 me-2" name="nombre" type="text" placeholder="Buscar Productos">
                        <button class="btn btn-outline-light me-5" type="submit">Buscar</button>
                    </form>
                </div>
            </div>

           <!--iniciar sesion, registrarse o cerrar sesión-->
<div id="regis" class="col-md-4 p-1 d-flex justify-content-end">
    <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 0 || $_SESSION['rol'] === 1)): ?>
        <form action="index.php?action=logout" method="POST">
            <button type="submit" class="btn btn-light text-danger h-100">
                Cerrar sesión (<?= $_SESSION['rol'] === 1 ? 'Admin' : 'Usuario' ?>)
            </button>
        </form>
    <?php else: ?>
        <form action="index.php?action=login" method="GET">
            <button type="submit" name="action" value="login" class="btn btn-light h-100">Iniciar sesión</button>
        </form>
        <form action="index.php?action=insertUser" method="GET">
            <button type="submit" name="action" value="insertUser" class="btn btn-light ms-1 text-danger h-100">Registrarse</button>
        </form>
    <?php endif; ?>
</div>
<!--fin de control de sesión-->

        </div>

    </div>

    <div class="container-fluid" id="detallesproducto">
        <!--AQUI VA LOS DETALLES DEL PRODUCTO Y ESO-->
        <div class="container-fluid">
            <div class="row">
                <!--cajita del lado izquierdo-->
                <div class="col-md-6 p-4 bg-light rounded shadow"><!--"Section"-->
                    <?php foreach ($Productos as $producto): ?>
                        <p class="text-uppercase fw-bold text-center text-secondary"><?php echo $producto['categoria_nombre']; ?></p></p><!--toca seguir modificando pero aja-->

                        <h2 class="text-center"><?php echo $producto['nombre']; ?></h2>
                        <img src="photo/<?= $producto['foto'] ?>" alt="Imagen producto" class="img-fluid d-block mx-auto">

                        <!-- Botones Descripción/Detalles -->
                        <div class="text-start mt-3">
                            <h5 class="text-danger">Descripción</h5>
                            <p><?php echo $producto['descripcion']; ?></p>

                            <div class="col-6">

                            </div>
                        </div>

                        <!-- Botón Añadir al carrito -->
                        <div class="text-center mt-4">
                            <button class="btn btn-danger">Comprar</button>
                            <button class="btn btn-danger">Añadir al carrito</button>
                        </div>

                </div>

                <!--Hola, cajita del lado derecho-->
                <div class="col-md-6 p-4 bg-white rounded shadow"><!--"Section2"-->
                    <h1 class="text-start">$<?= $producto['precio'] ?></h1>
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
                <div class="mb-3">
                    <label for="formularioreseña" class="form-label">Correo electrónico: </label>
                    <input type="text" class="form-control" placeholder="ejemplocorreo@gmail.com">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Escribe tu opinión" required></textarea>
                </div>
                <div>
                    <button id="botonenviar" type="submit" class="btn btn-danger">Enviar</button>
                </div>

                <div id="commentsection" class="mt-3">
                    <p>Comentarios:</p>
                    <ul id="commentlist"></ul>
                </div>
                <!--Comentarios de usuarios-->

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