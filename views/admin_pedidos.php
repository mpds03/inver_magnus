<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos de Clientes</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Pedidos realizados (Carrito / Factura)</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Factura</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($facturas as $f): ?>
            <tr>
                <td><?= $f['IdFactura'] ?></td>
                <td><?= $f['fecha'] ?></td>
                <td><?= $f['numero_documento'] ?></td>
                <td><?= $f['total'] ?></td>
                <td><?= $f['estado'] ?? 'Pendiente' ?></td>
                <td>
                    <form method="post" action="index.php?action=actualizarEstadoFactura" style="display:inline;">
                        <input type="hidden" name="IdFactura" value="<?= $f['IdFactura'] ?>">
                        <select name="nuevo_estado" class="form-select form-select-sm d-inline w-auto">
                            <option <?= ($f['estado'] ?? '') == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                            <option <?= ($f['estado'] ?? '') == 'Enviado' ? 'selected' : '' ?>>Enviado</option>
                            <option <?= ($f['estado'] ?? '') == 'Entregado' ? 'selected' : '' ?>>Entregado</option>
                        </select>
                        <button type="submit" class="btn btn-danger btn-sm">Actualizar</button>
                    </form>
                    <form method="post" action="index.php?action=eliminarFactura" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este pedido?');">
                        <input type="hidden" name="IdFactura" value="<?= $f['IdFactura'] ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm ms-1">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Pedidos de Compra Directa</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Cliente</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($comprasDirectas as $c): ?>
            <tr>
                <td><?= $c['IdCompra'] ?></td>
                <td><?= $c['numero_documento'] ?></td>
                <td><?= $c['direccion'] ?></td>
                <td><?= $c['estado'] ?? 'Pendiente' ?></td>
                <td>
                    <form method="post" action="index.php?action=actualizarEstadoCompra" style="display:inline;">
                        <input type="hidden" name="IdCompra" value="<?= $c['IdCompra'] ?>">
                        <select name="nuevo_estado" class="form-select form-select-sm d-inline w-auto">
                            <option <?= ($c['estado'] ?? '') == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                            <option <?= ($c['estado'] ?? '') == 'Enviado' ? 'selected' : '' ?>>Enviado</option>
                            <option <?= ($c['estado'] ?? '') == 'Entregado' ? 'selected' : '' ?>>Entregado</option>
                        </select>
                        <button type="submit" class="btn btn-danger btn-sm">Actualizar</button>
                    </form>
                    <form method="post" action="index.php?action=eliminarCompra" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este pedido?');">
                        <input type="hidden" name="IdCompra" value="<?= $c['IdCompra'] ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm ms-1">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=AdminVista" class="btn btn-secondary">Volver al panel</a>
</div>
</body>
</html>