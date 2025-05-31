
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Verificar Código</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h4>Ingresa el código enviado a tu correo</h4>
    <form action="index.php?action=verificarCodigo" method="POST">
        <div class="form-group">
            <input type="text" name="codigo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger mt-3">Verificar</button>
    </form>
</div>
</body>
</html>