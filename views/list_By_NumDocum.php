<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <title>Actualizar</title>
</head>
<body>
    <h1>actualizar por numero de documento</h1>
    <form action="index.php?action=searchClienteXNumDocum" method= "GET">
        <input type="hidden" name="action" value="searchClienteXNumDocum">
        <label for="">Numero de documento</label>
        <input type="text" name="numero_documento">
        <input type="submit" value="Buscar">
    </form>


        <h2>Lista de Usuarios</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Número de Documento</th>
                <th>Tipo de Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
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
                <td><?= $cliente['direccion']; ?></td>
                <td><?= $cliente['contraseña']; ?></td>
                <td><?= $cliente['email']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        
<form class="text-center p-3" action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
                    <button type="submit"name="action" value="InverBoard" class="btn btn-outline-danger">Cancelar</button>
                    </form>
</body>
</html>