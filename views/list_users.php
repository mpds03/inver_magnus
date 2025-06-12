<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css"><!--LE CAMBIÉ EL CSS AL DEL INICIO att: Maria-->
</head>

<body>
    <div class="container mt-5">
        <h1>Lista de Usuarios</h1>
        <div class="d-flex justify-content-between">
            <!--form de busqueda de usuario:-->
            <form class="d-flex mb-3" action="index.php?action=searchUserByNumDocum" method="GET">
                <input type="hidden" name="action" value="searchUserByNumDocum">
                <input type="text" class="form-control form-control-md me-1" name="numero_documento" placeholder="Buscar por documento" required>
                <input type="submit" class="btn btn-danger" value="Buscar">
            </form>

            <form action="index.php?action=insertUser" method="GET">
                <button class="btn btn-danger" type="submmit" name="action" value="insertUser">Insertar Usuario</button>
            </form>
            <!--form de busqueda de usuario-->
        </div><!--fin container mt-5-->
        <table border="1" mb="10px" mt="10px" class="table table-striped">
            <thead>
                <tr>
                    <th>Número de Documento</th>
                    <th>Tipo de Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Contraseña</th>
                    <th>Correo electrónico</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente['numero_documento']; ?></td>
                        <td><?= $cliente['tipo_doc_nombre']; ?></td>
                        <td><?= $cliente['nombres']; ?></td>
                        <td><?= $cliente['apellidos']; ?></td>
                        <td><?= $cliente['direccion']; ?></td>
                        <td><?= $cliente['contraseña']; ?></td>
                        <td><?= $cliente['email']; ?></td>
                        <td><!--Actualizar usuario-->
                            <form action="index.php?action=openForm" method="get">
                                <input type="hidden" name="action" value="searchClienteXNumDocum">
                                <input type="hidden" name="numero_documento" value="<?= $cliente['numero_documento']; ?>">
                                <input type="submit" class="btn btn-secondary" value="Actualizar">
                            </form>
                        </td><!--Actualizar usuario-->
                        <td><!--Eliminar usuario-->
                            <form action="index.php?action=eliminarUser" method="GET">
                                <input type="hidden" name="action" value="eliminarUser">
                                <input type="hidden" name="numero_documento" value="<?= $cliente['numero_documento']; ?>">
                                <input type="submit" value="eliminar" class="btn btn-danger">
                            </form>
                        </td><!--Eliminar usuario-->
                        <td>
                            <form action="index.php?action=cambiarRolUsuario" method="post" class="d-flex gap-1">
                                <input type="hidden" name="numero_documento" value="<?= $cliente['numero_documento']; ?>">
                                <select name="nuevo_rol" class="form-select form-select-sm">
                                    <option value="0" <?= $cliente['rol'] == 0 ? 'selected' : '' ?>>Usuario</option>
                                    <option value="1" <?= $cliente['rol'] == 1 ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Cambiar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="index.php?action=dashboard" method="post" enctype="multipart/form-data">
            <button class="btn btn-danger" type="submit" name="action" value="dashboard">InverBoard</button>
        </form>

    </div>

    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script><!--NYAAA-->
</body>

</html>