<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ejemp.css">
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
                      <h4 class="mb-4">Actualizar Datos</h4>
                      <form action="index.php?action=actualizarUser" method="POST">
                        <?php
                        // Solo mostrar el primer usuario encontrado (el logueado)
                        if (!empty($clientes) && is_array($clientes)):
                          $cliente = $clientes[0];
                        ?>
                          <input type="hidden" name="numero_documento" value="<?= $cliente['numero_documento']; ?>">

                          <div class="form-group">
                            <i class="input-icon uil uil-user"></i>
                            <select name="IdDocum" id="IdDocum" class="form-style" required>
                              <?php foreach ($docums as $docum): ?>
                                <option value="<?= htmlspecialchars($docum['IdDocum'], ENT_QUOTES, 'UTF-8'); ?>"
                                  <?= ($docum['IdDocum'] == $cliente['IdDocum']) ? 'selected' : ''; ?>>
                                  <?= htmlspecialchars($docum['TipoDocum'], ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <input type="text" name="nombres" class="form-style" value="<?= $cliente['nombres']; ?>" placeholder="Nombres" required>
                            <i class="input-icon uil uil-user"></i>
                          </div>
                          <div class="form-group">
                            <input type="text" name="apellidos" class="form-style" value="<?= $cliente['apellidos']; ?>" placeholder="Apellidos" required>
                            <i class="input-icon uil uil-user"></i>
                          </div>
                          <div class="form-group">
                            <input type="email" name="email" class="form-style" value="<?= $cliente['email']; ?>" placeholder="Correo electrónico" required>
                            <i class="input-icon uil uil-at"></i>
                          </div>
                          <div class="form-group">
                            <input type="text" name="direccion" class="form-style" value="<?= $cliente['direccion']; ?>" placeholder="Dirección de residencia" required>
                            <i class="input-icon uil uil-home"></i>
                          </div>
                          <input type="submit" class="btn btn-outline-danger" value="Guardar">
                        <?php endif; ?>
                      </form>
                      <form class="text-center p-3" action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
                        <button type="submit"name="action" value="InverBoard" class="btn btn-outline-danger">Cancelar</button>
                      </form>
                    </div>
                  </div> <!-- Fin de card-back -->
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>  
</body>
</html>

