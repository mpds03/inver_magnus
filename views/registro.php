<!DOCTYPE html>
<html lang="es">
<head>
  <title>Sesión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/ejemp.css">
  <link rel="shortcut icon" href="images/icon.ico">
</head> 
<body>
  <div class="bg-image">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3 ">Registrarse</h4>
                      <form action="index.php?action=insertUser" method="POST">  
                        <div class="form-group">
                          <select class="form-style" id="sel" required>
                            <option value="" disabled selected>Tipo De Documento</option>
                            <?php foreach ($docums as $docum):?>
                                <option value="<?= $docum['IdDocum']; ?>"><?=$docum['TipoDocum'];?></option>
                                <?php endforeach?>
                          </select>
                          <i class="input-icon uil uil-file-alt"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="IdDocum" class="form-style" placeholder="Número de Documento" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="nombres" class="form-style" placeholder="Nombres" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="apellidos" class="form-style" placeholder="Apellidos" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="tel" name="telefono" class="form-style" placeholder="Teléfono" required>
                          <i class="input-icon uil uil-phone"></i>
                        </div>
                        <div class="form-group">
                          <input type="password" name="contraseña" class="form-style" placeholder="Contraseña" required>
                          <i class="input-icon uil uil-lock"></i>
                        </div>
                        <div class="form-group">
                          <input type="email" name="email" class="form-style" placeholder="Correo Electrónico" required>
                          <i class="input-icon uil uil-envelope"></i>
                        </div>
                        <input type="submit" value="Registrarse" class="btn btn-outline-danger">
                      </form>
                    </div>
                  </div>
                </div> <!-- Fin card-front -->
              </div>
            </div>
          </div> <!-- Fin section -->
        </div>
      </div>
    </div>
  </div>
</body>
</html>