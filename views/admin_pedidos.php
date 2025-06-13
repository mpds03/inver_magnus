<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos de Clientes</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Pedidos de clientes</h1>
    
    <form method="get" action="index.php" class="mb-4 d-flex justify-content-center">
        <input type="hidden" name="action" value="adminPedidos">
        <input type="text" name="buscar_documento" class="form-control w-auto me-2" placeholder="Buscar por documento" value="<?= isset($_GET['buscar_documento']) ? htmlspecialchars($_GET['buscar_documento']) : '' ?>">
        <button type="submit" class="btn btn-danger me-2">Buscar</button>
        <a href="index.php?action=InverBoard" class="btn btn-secondary">Volver al inicio</a>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="8" class="text-center">Pedidos realizados (Carrito)</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($facturas as $f): ?>
            <tr class="table-secondary">
                <td colspan="8">
                    <strong>Factura N°:</strong> <?= $f['IdFactura'] ?> |
                    <strong>Fecha:</strong> <?= $f['fecha'] ?> |
                    <strong>Cliente:</strong> <?= $f['numero_documento'] ?> |
                    <strong>Dirección:</strong> <?= htmlspecialchars($f['direccion'] ?? 'No registrada') ?> |
                    <strong>Total:</strong> <?= $f['total'] ?> |
                    <strong>Estado:</strong> <?= $f['estado'] ?? 'Pendiente' ?>
                    <span class="float-end">
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
                    </span>
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