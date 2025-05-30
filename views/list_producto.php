<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css"><!--LE CAMBIÉ EL CSS AL DEL INICIO att: Maria-->
</head>
<body>
    <div class="container mt-5">
    <h1>Lista de Productos</h1>
    <div class="d-flex justify-content-between">

    <form class="d-flex mb-3" action="index.php?action=listproductoporcodigo" method="get">
        <input type="hidden" name="action" value="listproductoporcodigo">
        <input type="text" class="form-control form-control-md me-1" name="codigo" placeholder="Buscar Por Codigo" required>
        <input type="submit" class="btn btn-danger " value="Buscar">
    </form>

    <form action="index.php?action=insertproducto" method="GET">
                <button type="submit" class="btn btn-danger mb-3" name="action" value="insertproducto">Insertar Productos</button>
            </form>
</div>
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
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Productos as $Producto): ?>
                <tr>
            <td><?=$Producto['codigo'];?></td>
            <td><?=$Producto['nombre'];?></td>
            <td><?=$Producto['categoria_nombre'];?></td>
            <td><?=$Producto['descripcion'];?></td>
            <td><img src="photo/<?=$Producto['foto'];?>" width="100" alt="Foto"></td>
            <td><?=$Producto['cantidad'];?></td>
            <td><?=$Producto['precio'];?></td>
            <td><!--Editar producto-->
                <form action="index.php?action=buscarProducto" method="get">
                    <input type="hidden" name="action" value="buscarProducto">
                    <input type="hidden" name="codigo" value="<?=$Producto['codigo'];?>">
                    <input type="submit" class="btn btn-secondary" value="Actualizar">
                </form>
            </td>
            <td><!--Eliminar producto-->
                <form action="index.php?action=eliminarProducto" method="get">
                    <input type="hidden" name="action" value="eliminarProducto">
                    <input type="hidden" name="codigo" value="<?=$Producto['codigo'];?>">
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
            </td>
            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <form action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
        <button type="submit" name="action" class="btn btn-danger" value="InverBoard">InverBoard</button>
     </form>

     </div>

        <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script><!--NYAAA-->
</body>
</html>