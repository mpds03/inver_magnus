<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Producto por codigo</title>
</head>

<body>
    <h1>Buscar Producto por codigo</h1>
    <form action="index.php?action=buscar" method="get">
        <input type="hidden" name="action" value="buscar">
        <label for="">Codigo</label>
        <input type="text" name="codigo" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if (isset($Productos) && count($Productos) > 0): ?>
    <h1>Lista de Productos</h1>
    <table border="1">

        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Foto</th>
                <th>Cantidad del producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Productos as $Producto): ?>
                <tr>
            <td><?=$Producto['codigo'];?></td>
            <td><?=$Producto['nombre'];?></td>
            <td><?=$Producto['IdCategoria'];?></td>
            <td><?=$Producto['descripcion'];?></td>
            <td><img src="photo/<?=$Producto['foto'];?>" width="100" alt="Foto"></td>
            <td><?=$Producto['cantidad'];?></td>
            <td><?=$Producto['precio'];?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php elseif (isset($Productos)): ?>
        <p>No se encontraron usuarios con ese nombre.</p>
    <?php endif; ?>
     <form action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
        <button type="submit" name="action" value="InverBoard">InverBoard</button>
     </form>
</body>
</html>