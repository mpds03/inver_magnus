<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar usuario por numero de documento</title>
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css"><!--LE CAMBIÉ EL CSS AL DEL INICIO att: Maria-->
</head>

<body>
    <div class="container">
        <?php if (isset($clientes) && count($clientes) > 0): ?>

            <h1>Lista de Usuarios</h1>
            <table border="1" mb="10px" mt="10px" class="table table-striped">
                <thead>
                    <tr>
                        <th>Número de Documento</th>
                        <th>Tipo de Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>contraseña</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= $cliente['numero_documento']; ?></td>
                            <td><?= $cliente['IdDocum']; ?></td>
                            <td><?= $cliente['nombres']; ?></td>
                            <td><?= $cliente['apellidos']; ?></td>
                            <td><?= $cliente['telefono']; ?></td>
                            <td><?= $cliente['contraseña']; ?></td>
                            <td><?= $cliente['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (isset($clientes)): ?>
            <p>No se encontraron usuarios con ese nombre.</p>
        <?php endif; ?>
        <form class="text-center p-3" action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
            <button type="submit" name="action" value="InverBoard" class="btn btn-outline-danger">Cancelar</button>
        </form>
    </div><!--div final lol-->
    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script><!--NYAAA-->
</body>

</html>