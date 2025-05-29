<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/producto.css">
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow p-4">
            <h2 class="text-center mb-4">Registro de Producto</h2>
            <form action="index.php?action=insertproducto" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
    <label for="codigo" class="form-label">Código</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $codigo_siguiente; ?>" readonly>
</div>
                <div class="mb-3">
                <label for="" class="form-label">Categoria Del Producto</label>
                        <select class="form-style  form-select " name="IdCategoria" id="sel" required>
                            <option value="" disabled selected>Tipo De Categoria</option>
                            <?php foreach ($Categorias as $Categoria):?>
                                <option value="<?= $Categoria['IdCategoria']; ?>"><?=$Categoria['nombre'];?></option>
                                <?php endforeach?>
                          </select>
                          </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" id="descripcion" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="precio" name="descripcion" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="" name="foto" accept="image/*">
                </div>

                 <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad del producto</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad">
                </div>
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="nombre" name="precio">
                </div>

                <div class="text-center p-3">
                    <button type="submit" class="btn btn-outline-danger">Subir Producto</button>
                </div>

                </form>
                <form class="text-center p-3" action="index.php?action=listProducto" method="post" enctype="multipart/form-data">
                    <button type="submit"name="action" value="listProducto" class="btn btn-outline-danger">Cancelar</button>
                    </form>
        </div>
    </div>
    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>