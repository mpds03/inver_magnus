
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cambiar Contraseña</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h4>Cambiar Contraseña</h4>
    <form action="index.php?action=cambiarContraseña" method="POST">
        <div class="form-group">
            <label>Nueva contraseña:</label>
            <input type="password" name="nueva_contraseña" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Confirmar contraseña:</label>
            <input type="password" name="confirmar_contraseña" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger mt-3">Cambiar</button>
    </form>
</div>
</body>
</html>