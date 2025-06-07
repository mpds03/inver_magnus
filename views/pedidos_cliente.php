
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pedidos</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Mis Pedidos</h1>
    <h2>Pedidos realizados (Carrito)</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Factura</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($facturas as $f): ?>
            <tr>
                <td><?= $f['IdFactura'] ?></td>
                <td><?= $f['fecha'] ?></td>
                <td><?= $f['total'] ?></td>
                <td><?= $f['estado'] ?? 'Pendiente' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Pedidos de Compra Directa</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Dirección</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($comprasDirectas as $c): ?>
            <tr>
                <td><?= $c['IdCompra'] ?></td>
                <td><?= $c['direccion'] ?></td>
                <td><?= $c['estado'] ?? 'Pendiente' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=InverBoard" class="btn btn-secondary">Volver al panel</a>
</div>
</body>
</html>