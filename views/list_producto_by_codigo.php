<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css"><!--LE CAMBIÉ EL CSS AL DEL INICIO att: Maria-->
</head>
<body>
    <div class="container mt-5">
    <h1>Lista de Productos</h1> 

    <!-- <form action="index.php?action=listproductoporcodigo" method="get">
        <input type="hidden" name="action" value="listproductoporcodigo">
        <label for="">Codigo</label>
        <input type="text" name="codigo" required>
        <input type="submit" class="btn btn-outline-danger" value="Buscar">
    </form> -->

     <table border="1" mb="10px" mt="10px" class="table table-striped">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Foto</th>
                <th>Cantidad Del producto</th>
                <th>Precio</th>
                <th>Editar</th>
                <th>Estado</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Productos as $Producto): ?>
                <tr<?php if ($Producto['estado'] == 0): ?> style="opacity:0.6;"<?php endif; ?>>
                    <td><?=$Producto['codigo'];?></td>
                    <td><?=$Producto['nombre'];?></td>
                    <td><?=$Producto['categoria_nombre'];?></td>
                    <td>
                        <?=$Producto['descripcion'];?>
                        <?php if ($Producto['estado'] == 0): ?>
                            <div class="text-danger small mt-1"><strong>Producto deshabilitado</strong></div>
                        <?php endif; ?>
                    </td>
                    <td><img src="photo/<?=$Producto['foto'];?>" width="100" alt="Foto"></td>
                    <td><?=$Producto['cantidad'];?></td>
                    <td><?=$Producto['precio'];?></td>
                    <td>
                        <form action="index.php?action=buscarProducto" method="get">
                            <input type="hidden" name="action" value="buscarProducto">
                            <input type="hidden" name="codigo" value="<?=$Producto['codigo'];?>">
                            <input type="submit" class="btn btn-secondary" value="Actualizar">
                        </form>
                    </td>
                    <td>
                        <form action="index.php?action=cambiarEstadoProducto" method="post">
                            <input type="hidden" name="codigo" value="<?=$Producto['codigo'];?>">
                            <input type="hidden" name="estado" value="<?= $Producto['estado'] == 1 ? 0 : 1 ?>">
                            <?php if ($Producto['estado'] == 1): ?>
                                <button type="submit" class="btn btn-outline-danger">Deshabilitar</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-outline-success">Habilitar</button>
                            <?php endif; ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <form action="index.php?action=listProducto" method="post" enctype="multipart/form-data">
        <button type="submit" name="action" class="btn btn-danger" value="listProducto">Volver</button>
     </form>

     </div>

        <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script><!--NYAAA-->
</body>
</html>