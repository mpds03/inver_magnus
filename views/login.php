<!DOCTYPE html>
<html lang="es">
<head>
    <title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ejemp.css">
    <link rel="shortcut icon" href="images/icon.ico">
</head>
<body>
    <div class="bg-image">
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Iniciar sesión</h4>
                                            <form action="index.php?action=login" method="POST">
                                                <div class="form-group">
                                                    <input type="text" name="numero_documento" class="form-style" placeholder="Número de Documento" required>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="contraseña" class="form-style" placeholder="Contraseña" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Iniciar sesión</button>
                                            </form>
                                            <p class="mb-0 mt-4 text-center"><a href="olvidocontra.html" class="link">¿Olvidó su contraseña?</a></p>
                                        </div>
                                    </div>
                                </div> <!-- Fin de card-front -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>