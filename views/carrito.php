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
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
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
                    <td>
                        <img src="photo/<?= htmlspecialchars($item['foto']) ?>" alt="Imagen" style="width:60px;height:60px;object-fit:cover;">
                    </td>
                    <td><?= htmlspecialchars($item['nombre']) ?></td>
                    <td><?= htmlspecialchars($item['descripcion']) ?></td>
                    <td><?= htmlspecialchars($item['codigo']) ?></td>
                    <td><?= htmlspecialchars($item['cantidad']) ?></td>
                    <td><?= htmlspecialchars($item['precioUnitario']) ?></td>
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
        <div class="mb-3">
            <a href="index.php?action=vaciarCarrito" class="btn btn-warning me-2">Vaciar carrito</a>
            <a href="index.php?action=generarFactura" class="btn btn-success me-2">Finalizar compra</a>
            <a href="index.php?action=InverBoard" class="btn btn-secondary">Seguir comprando</a>
        </div>
        <?php else: ?>
            <p>No hay productos en el carrito.</p>
            <a href="index.php?action=InverBoard" class="btn btn-secondary">Volver</a>
        <?php endif; ?>
    </div>
</body>
</html>