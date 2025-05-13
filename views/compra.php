<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de producto</title>
</head>
<body>
    <h1>Buscar compra por ID de compra</h1>
    <form action="index.php?action=compra" method="GET" enctype="multipart/form-data">
        <input type="text" name="action" value="compra" required>
        <label for="codigo">Codigo</label>

        <input type="text" name="codigo" required>
        <input type="submit" value="Comprar">
    </form>

    



</body>
</html>