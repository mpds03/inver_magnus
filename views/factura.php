<?php
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="shortcut icon" href="/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/productinfo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<h2>Factura</h2>
<p>Factura N°: <?= $factura['IdFactura'] ?></p>
<p>Fecha: <?= $factura['fecha'] ?></p>
<p>Cliente: <?= $factura['numero_documento'] ?></p>
<table>
    <tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Total</th></tr>
    <?php foreach ($detalles as $item): ?>
    <tr>
        <td><?= $item['codigo'] ?></td>
        <td><?= $item['cantidad'] ?></td>
        <td><?= $item['precio_unitario'] ?></td>
        <td><?= $item['total_detalle'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<p>Total: <?= $factura['total'] ?></p>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>