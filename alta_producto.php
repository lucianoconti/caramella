<?php
session_start();
include_once('php/conexion_database.php');
include_once('index.php');

if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
  }else if($_SESSION['acceso']==1){
    header("Location:./catalogo.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleABM_productos.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h2>Agregar Producto</h2>
        <div class="contenedor-form">
            <form class="producto-form" method="POST" action="php/ABM_productos.php" enctype="multipart/form-data">
                <label for="nombreProducto" class="producto-label">Nombre del Producto:</label>
                <input type="text" id="nombreProducto" name="nombreProducto" required><br><br>
    
                <label for="valorProducto" class="producto-label">Precio:</label>
                <input type="text" id="valorProducto" name="valorProducto" required><br><br>
                
                <label for="imagenes" class="producto-label">Imágenes:</label>
                <input type="file" id="imagenes" name="imagenes[]" multiple><br><br>
    
                <label for="descripcion" class="producto-label">Descripción:</label><br>
                <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>
    
                <button type="submit" name="boton_ABM" value="A">Agregar Producto</button>
            </form>
        </div>
    </main>
</body>
</html>