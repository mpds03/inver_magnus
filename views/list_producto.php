<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table border="1">

        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Foto</th>
                <th>Cantidad Del producto</th>
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
     <form action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
        <button type="submit" name="action" value="InverBoard">InverBoard</button>
     </form>
</body>
</html>