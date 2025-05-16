<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InverBoard</title>
</head>
<body>


<h1>Menu</h1>

<!-- <?php $rol = $_SESSION["rol"];
    echo "El rol es: $rol";
    echo "<br>";
    $nom = $_SESSION["nombre"];
    echo "El nombre es: $nom"
    ?> -->

    <form action="index.php?action=insertproducto" method="GET">
    <button  type="submit" name="action" value="insertproducto">Insertar Productos</button>
    </form>


    <form action="index.php?action=listProducto" method="GET">
    <button type="submit" name="action" value="listProducto">Consultar Productos</button>
    </form>
    

    <form action="index.php?action=listproductoporcodigo" method="GET">
    <button type="submit" name="action" value="listproductoporcodigo">Actualizar Productos</button>
    </form>

     <form action="index.php?action=delete" method="GET">
    <button type="submit" name="action" value="delete">Eliminar Productos</button>
    </form>
    
    <form action="index.php?action=insertUser" method="GET">
    <button type="submmit" name="action" value="insertUser">Insertar Usuario</button>
    </form>

</body>
</html>
 