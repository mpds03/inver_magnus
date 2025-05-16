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
        <div class="container mb-3">
            <div class="card shadow p-4">
                <h2 class="text-center mb-4">Actualizar el  Producto</h2>
                <form action="index.php?action=actualizarProducto" method="POST" enctype="multipart/form-data">
                    <?php foreach ($Productos as $Producto): ?>
                    <div class="mb-3">
                        <input type="hidden" name="codigo" value="<?= $Producto['codigo']; ?>">
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
                        <label for="nombre" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $Producto['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $Producto['descripcion']; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <img src="photo/<?= $Producto['foto']; ?>" alt="foto actual" width="100">
                        <input type="hidden" class="form-control" id="" name="foto_actual" value="<?= $Producto['foto']; ?>">  
                    </div>
                <label for="">Nueva foto (Opcional)</label>
                <input type="file" name="foto" id="">

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad del producto</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" step="0.01" value="<?= $Producto['cantidad']; ?>">
                </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?= $Producto['precio']; ?>">
                    </div>
                    <?php endforeach; ?>
                    <div class="text-center">
                    <button type="submit" name="action" value="actualizar" class="btn btn-outline-danger">Actualizar</button>
                    </div>
                    </form>
                    <div class="d-flex justify-content-center p-3">
                    <form action="index.php?action=InverBoard" method="post" enctype="multipart/form-data">
                        <button type="submit"name="action" value="InverBoard" class="btn btn-outline-danger">Cancelar</button>
                        </form>

                        
                    </div>
            </div>
        </div>
        <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>