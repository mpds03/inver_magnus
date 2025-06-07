<?php
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inverboard.css">
</head>
<body>

<div class="container mt-5">
<h2>Factura</h2>
<p>Factura N°: <?= $factura['IdFactura'] ?></p>
<p>Fecha: <?= $factura['fecha'] ?></p>
<p>Cliente: <?= $factura['numero_documento'] ?></p>
<table class="table">
    <tr>
        <th>Codigo producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Total</th>
    </tr>
    <?php if (!empty($detalles)): ?>
        <?php foreach ($detalles as $item): ?>
            <tr>
                <td><?= $item['codigo'] ?></td>
                <td><?= $item['cantidad'] ?></td>
                <td><?= number_format($item['precio_unitario'], 0, ',', '.') ?></td>
                <td><?= number_format($item['total_detalle'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="4">No hay detalles para esta factura.</td></tr>
    <?php endif; ?>
</table>
<p>Total: <?= $factura['total'] ?></p>


    <!--Volver al inicio-->
<div class="text-center">
    <a href="index.php?action=verCarrito" class="btn btn-outline-danger">Volver al Carrito</a>
    <a href="index.php?action=InverBoard" class="btn btn-danger">Volver al Inicio</a>
</div>

 </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>