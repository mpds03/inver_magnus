<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pedidos</title>
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Mis Pedidos</h1>
    <div class=" d-flex justify-content-center mb-4">
    <a href="index.php?action=InverBoard" class="btn btn-danger">Volver al inicio</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="8" class="text-center">Historial de pedidos realizados</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach ($facturas as $f): ?>
            <tr class="table-secondary">
                <td colspan="8">
                    <strong>Factura N°:</strong> <?= $f['IdFactura'] ?> |
                    <strong>Fecha:</strong> <?= $f['fecha'] ?> |
                    <strong>Total:</strong> <?= $f['total'] ?> |
                    <strong>Estado:</strong> <?= $f['estado'] ?? 'Pendiente' ?>
                    <strong>Dirección de entrega:</strong> <?= htmlspecialchars($f['direccion'] ?? 'No registrada') ?>
                </td>
            </tr>
            <tr>
                <th>Nombre Producto</th>
                <th>Código</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total Detalle</th>
                <th colspan="3"></th>
            </tr>
            <?php if (!empty($f['detalles'])): ?>
                <?php foreach ($f['detalles'] as $detalle): ?>
                    <tr>
                        <td><?= htmlspecialchars($detalle['nombre']) ?></td>
                        <td><?= $detalle['codigo'] ?></td>
                        <td><?= $detalle['cantidad'] ?></td>
                        <td><?= number_format($detalle['precio_unitario'], 0, ',', '.') ?></td>
                        <td><?= number_format($detalle['total_detalle'], 0, ',', '.') ?></td>
                        <td colspan="3"></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Sin productos</td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

    
</div>
<script src="/Bootstrap/js/bootstrap.bundle.min.js"></script><!--NYAAA-->
</body>
</html>