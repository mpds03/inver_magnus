<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle producto</title>
    <link rel="shortcut icon" href="/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/productinfo.css">
</head>
<body>
    <div class="container-fluid" id="cajamadre">
        <div class="row">
            <div class="col-md-3 p-1">
                <div class="d-flex">
            <nav class="navbar-expand">
                    <ul class="navbar-nav">
                       <a href="index.php?action=InverBoard"><button type="submit" value="InverBoard" class="btn btn-light text-danger h-100 ">Inicio</button></a>  
                      <li class="nav-item dropdown">

                        <button class="nav-link dropdown-toggle btn btn-light text-dark ms-1" href="#" role="button" data-bs-toggle="dropdown" aria-expand="false">Electrodomesticos</button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Cuidado del hogar</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Cocina</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Accesorios para electrodomesticos</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Cuidado personal</a></li>
                        </ul>
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
        
        <div id="regis" class="col-md-4 p-1">
            <a href="ejem.html"><button type="submit" class="btn btn-light h-100" >Iniciar sesión</button></a>

            <form action="index.php?action=insertUser" method="GET">
                <button type="submit" name="action" value="insertUser" class="btn btn-light ms-1 text-danger h-100">Registrarse</button>
                </form>
         </div>

    </div>
 
</div>

            <!-- CARDS -->
            <div class="row row-cols-1 row-cols-md-5 mt-3">

                <!--CARD CONECTADA A LA DATABASE-->
                <?php if (!empty($Productos) && is_array($Productos)): ?>
                <?php foreach ($Productos as $producto): ?>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="photo/<?= $producto['foto'] ?>" class="card-img-top estructura" alt="Imagen del producto">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                <p class="card-text"><?php echo $producto['precio'] ?></p>
                                <a href="index.php?action=productinfo&codigo=<?= $producto['codigo'] ?>" class="btn btn-danger">Mirar</a>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                     <p class="text-center">No se encontraron productos con ese nombre.</p>
                <?php endif; ?>
                <!--CARD CONECTADA A LA DATABASE-->

            </div><!--fin del div de row de cards-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>