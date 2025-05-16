<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar usuario por numero de documento</title>
</head>
<body>
    <h1>Buscar usuario por numero de documento</h1>
    <form action="index.php?action=searchUserByNumDocum" method= "GET">
        <input type="hidden" name="action" value="searchUserByNumDocum">
        <label for="">Numero de documento</label>
        <input type="text" name="numero_documento">
        <input type="submit" value="Buscar">
    </form>
    <?php if (isset($clientes) && count($clientes) > 0): ?>

        <h1>Lista de Usuarios</h1>
    <table border="1">
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
                    <button type="submit"name="action" value="InverBoard" class="btn btn-outline-danger">Cancelar</button>
                    </form>

</body>
</html>