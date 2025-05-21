<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de producto</title>
</head>
<body>
    <h1>Comprar producto</h1>
    <form action="index.php?action=HacerCompra" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="" value="<?php echo $producto['codigo']; ?>">
        <input type="hidden" name="cantidad" value="<?php echo $producto['cantidad']; ?>">
        <input type="submit" class="btn btn-danger" value="Comprar">
    </form>

    



</body>
</html>