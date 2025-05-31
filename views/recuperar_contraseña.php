
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recuperar Contraseña</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h4>Recuperar Contraseña</h4>
    <form action="index.php?action=enviarCodigoRecuperacion" method="POST">
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger mt-3">Enviar código</button>
    </form>
</div>
</body>
</html>