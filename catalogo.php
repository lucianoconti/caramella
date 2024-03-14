<?php
session_start();
include_once('php/conexion_database.php');

// funcion para construir el "where" de la consulta SQL
function construirFiltro($filtro) {
    switch ($filtro) {
        case 'precio_asc':
            return ' ORDER BY producto.valorProducto ASC';
        case 'precio_desc':
            return ' ORDER BY producto.valorProducto DESC';
        case 'nombre_torta':
            return ' ORDER BY producto.nombreProducto ASC';
        default:
            return '';
    }
}
include_once('index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleCatalogo.css">
    <title>Document</title>
</head>
<body>
<form method="GET" class="filtrar-btn">
    <label for="filtro">Filtrar por:</label>
    <select name="filtro" id="filtro">
        <option value="" disabled selected></option>
        <option value="precio_asc">Menor precio</option>
        <option value="precio_desc">Mayor precio</option>
        <option value="nombre_torta">Nombre de la torta</option>
    </select>
    <input type="submit" value="Filtrar">
</form>

<div class="catalogo">
    <?php
    // verifico si se realizo un filtro antes de mostrar el catalogo
    if (isset($_GET['filtro'])) {
        $filtro = $_GET['filtro'];
        $filtroSQL = construirFiltro($filtro);

        // la consulta con el filtro seleccionado
        $productos = "SELECT producto.Id_producto, producto.nombreProducto, producto.valorProducto, fotoproducto.Id_fotoProducto, fotoproducto.nombreFoto FROM producto LEFT JOIN ( SELECT Id_producto, MIN(Id_fotoProducto) AS Id_fotoProducto FROM fotoproducto GROUP BY Id_producto ) AS primeras_fotos ON producto.Id_producto = primeras_fotos.Id_producto LEFT JOIN fotoproducto ON primeras_fotos.Id_fotoProducto = fotoproducto.Id_fotoProducto" . $filtroSQL;
    } else {
        //la consulta sin filtro
        $productos = "SELECT producto.Id_producto, producto.nombreProducto, producto.valorProducto, fotoproducto.Id_fotoProducto, fotoproducto.nombreFoto FROM producto LEFT JOIN ( SELECT Id_producto, MIN(Id_fotoProducto) AS Id_fotoProducto FROM fotoproducto GROUP BY Id_producto ) AS primeras_fotos ON producto.Id_producto = primeras_fotos.Id_producto LEFT JOIN fotoproducto ON primeras_fotos.Id_fotoProducto = fotoproducto.Id_fotoProducto";
    }

    $resultado = $database->query($productos);

    if ($resultado->num_rows > 0) {
        while ($producto = $resultado->fetch_assoc()) {
            echo '<div class="producto">';
            echo '<img src="'.$producto['nombreFoto'].'" alt="' . $producto['nombreProducto'] . '">';
            echo '<h3>' . $producto['nombreProducto'] . '</h3>';
            echo '<p>Precio: $' . $producto['valorProducto'] . '</p>';
            echo '<a href="realizar_pedido.php?id=' . $producto['Id_producto'] . '">Ver más</a>';
            echo '</div>';
        }
    } else {
        echo 'No se encontraron productos en el catálogo.';
    }
    ?>

</div>
    
</body>
</html>