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
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <!--form de busqueda de usuario:-->
        <form action="index.php?action=searchUserByNumDocum" method="GET">
            <input type="hidden" name="action" value="searchUserByNumDocum">
            <label for="">Buscar por documento:</label>
            <input type="text" name="numero_documento">
            <input type="submit" value="Buscar" class="btn btn-danger">
        </form>

        <form action="index.php?action=insertUser" method="GET">
            <button class="btn btn-danger" type="submmit" name="action" value="insertUser">Insertar Usuario</button>
        </form>
        <!--form de busqueda de usuario-->

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
                        <td><?= $cliente['tipo_doc_nombre']; ?></td>
                        <td><?= $cliente['nombres']; ?></td>
                        <td><?= $cliente['apellidos']; ?></td>
                        <td><?= $cliente['telefono']; ?></td>
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
                        <form action=""></form>
                        <td></td>

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