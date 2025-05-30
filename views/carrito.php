
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Mi Carrito</h2>
        <?php if (!empty($productos)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($productos as $item): ?>
                <tr>
                    <td><?= $item['codigo'] ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td><?= $item['precioUnitario'] ?></td>
                    <td><?= $item['cantidad'] * $item['precioUnitario'] ?></td>
                    <td>
                        <a href="index.php?action=eliminarDelCarrito&idDetalleCarrito=<?= $item['idDetalleCarrito'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php $total += $item['cantidad'] * $item['precioUnitario']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mb-3">
            <strong>Total: $<?= $total ?></strong>
        </div>
        <a href="index.php?action=vaciarCarrito" class="btn btn-warning">Vaciar carrito</a>
        <a href="index.php?action=generarFactura" class="btn btn-success">Finalizar compra</a>
        <?php else: ?>
            <p>No hay productos en el carrito.</p>
        <?php endif; ?>
        <a href="index.php?action=InverBoard" class="btn btn-secondary mt-3">Seguir comprando</a>
    </div>
</body>
</html>