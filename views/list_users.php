<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
</head>
<body>
    
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

    <form action="index.php?action=dashboard" method="post" enctype="multipart/form-data">
        <button type="submit" name="action" value="dashboard">Dashboard</button>
    </form>
</body>
</html>