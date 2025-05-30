<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <h1>Carrito de compras</h1>
    <h2>Mi Carrito</h2>
    <table>
        <tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Total</th></tr>
        <?php foreach ($productos as $item): ?>
        <tr>
            <td><?= $item['codigo'] ?></td>
            <td><?= $item['cantidad'] ?></td>
            <td><?= $item['precioUnitario'] ?></td>
            <td><?= $item['cantidad'] * $item['precioUnitario'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>