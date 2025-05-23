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
            <form class="d-flex" role="search">
                <input class="form-control mx-5 me-2" type="search" placeholder="..." aria-label="Search">
                <button class="btn btn-outline-light me-5" type="submit">Buscar</button>
              </form>
            </div>
        </div>
        
        <div id="regis" class="col-md-4 p-1">
            <a href="ejem.html"><button type="submit" class="btn btn-light h-100" >Iniciar sesión</button></a>
 
             <a href="index.php?action=insertUser"><button type="submit" value="insertUser" class="btn btn-light ms-1 text-danger h-100">Registrarse</button></a>
         </div>

    </div>
 
</div>

<div class="container-fluid" id="detallesproducto">
    <!--AQUI VA LOS DETALLES DEL PRODUCTO Y ESO-->
<div class="container-fluid">
    <div class="row">
        <!--cajita del lado izquierdo-->
        <div class="col-md-6 p-4 bg-light rounded shadow"><!--"Section"-->
            <p class="text-uppercase fw-bold text-center text-secondary">Electrodoméstico</p>
            <h2 class="text-center"><?php echo $producto['nombre']; ?></h2>
            <img src= "photo/<?= $producto['foto'] ?>" alt="Imagen producto" class="img-fluid d-block mx-auto">

             <!-- Botones Descripción/Detalles -->
            <div class="text-start mt-3">
                <input class="desc-btn d-none" type="radio" id="desc-1" name="desc-btn" checked>
                <label for="desc-1" class="btn btn-danger">Descripción</label>

                <input class="desc-btn d-none" type="radio" id="desc-2" name="desc-btn">
                <label for="desc-2" class="btn btn-danger">Detalles</label>
            </div>

            <!-- Contenido de la descripción -->
            <div class="mt-3">
                <p><?php echo $producto['descripcion']; ?></p>
            </div>

            <!-- Contenido de los detalles -->
            <div class="row text-center mt-3">
                <div class="col-6"><p><span>xx</span> cm<br>Altura</p></div>
                <div class="col-6"><p><span>xx</span> cm<br>Ancho</p></div>
                <div class="col-6"><p><span>xx</span> L<br>Capacidad</p></div>
                <div class="col-6"><p><span>xx</span> kg<br>Peso</p></div>
            </div>

            <!-- Botón Añadir al carrito -->
            <div class="text-center mt-4">
                <button class="btn btn-danger">Añadir al carrito</button>
            </div>
        </div>

        <!--Hola, cajita del lado derecho-->
        <div class="col-md-6 p-4 bg-white rounded shadow"><!--"Section2"-->
            
            <h1 class="text-start">$300.000</h1>
            <h5 class="text-start">Opiniones del producto</h5>

            <!--Estrellas-->
            <div class="stars text-start mt-2" id="stars">
                <span data-value="1">★</span>
                <span data-value="2">★</span>
                <span data-value="3">★</span>
                <span data-value="4">★</span>
                <span data-value="5">★</span>
            </div>
            <p class="text-start">Calificación:</p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>