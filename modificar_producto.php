<?php
session_start();
include_once('php/conexion_database.php');
include_once('index.php');

if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
  }else if($_SESSION['acceso']==1){
    header("Location:./catalogo.php");
}

// Obtener el ID del producto a partir de la solicitud POST
$idProducto = $_POST['idProducto'];

// Obtener la información actual del producto desde la base de datos
$queryProducto = "SELECT * FROM producto WHERE Id_producto = $idProducto";
$resultadoProducto = $database->query($queryProducto);
$producto = $resultadoProducto->fetch_assoc();
$queryFotos = "SELECT * FROM fotoProducto WHERE ID_producto = $idProducto";
$resultadoFotos = $database->query($queryFotos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleABM_productos.css">
    <title>Modificar Producto</title>
</head>
<body>
    <main>
        <div>
            <h2>Modificar Producto</h2>
            <div class="contenedor-form">
                <form class="producto-form" method="POST" action="php/ABM_productos.php" enctype="multipart/form-data" onsubmit="return confirmarCambios()">
                    <input type="hidden" name="idProducto" value="<?php echo $producto['Id_producto']; ?>">
                    <label for="nombreProducto" class="producto-label">Nombre del Producto:</label>
                    <input type="text" id="nombreProducto" name="nombreProducto" value="<?php echo $producto['nombreProducto']; ?>" required><br><br>
        
                    <label for="valorProducto" class="producto-label">Precio:</label>
                    <input type="text" id="valorProducto" name="valorProducto" value="<?php echo $producto['valorProducto']; ?>" required><br><br>
                    
                    <label for="imagenes-actuales" class="producto-label">Imagenes actuales:</label>
                    <?php
                         if ($resultadoFotos->num_rows > 0) {
                             while ($muestroFoto = $resultadoFotos->fetch_assoc()) {
                                 echo '<div class="foto-producto">';
                                 echo '<img src="'.$muestroFoto['nombreFoto'].'" alt="' . $muestroFoto['nombreFoto'] . '">';
                                 echo '<div class="delete-icon" onclick="confirmarDelete(' . $muestroFoto['Id_fotoProducto'] . ')">X</div>';
                                 echo '</div>';
                                }
                            } else {
                                echo 'No se encontraron fotos del producto.';
                            }
                            ?>

                    <label for="imagenes" class="producto-label">Agregar imagenes:</label>
                    <input type="file" id="imagenes" name="imagenes[]" multiple><br><br>

                    <label for="descripcion" class="producto-label">Descripción:</label><br>
                    <textarea id="descripcion" name="descripcion" rows="4" cols="50" required><?php echo $producto['descripcion']; ?></textarea><br><br>
        
                    <button type="submit" name="boton_ABM" value="M">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </main>
    <script>
        function confirmarCambios() {
            var confirmacion = confirm("¿Estás seguro de que deseas guardar los cambios?");

            if (confirmacion) {
                return true;
            } else {
                return false;
            }
        }
        function confirmarDelete(idFoto) {
            var confirmacion = confirm("¿Estás seguro de eliminar esta foto?");
        if (confirmacion) {
        // Usar AJAX para enviar una solicitud al servidor
            var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText); // Mostrar la respuesta del servidor (mensaje de alerta)
                window.location.reload();
            }
        };
        xhttp.open("GET", "php/ABM_productos.php?idFoto=" + idFoto, true);
        xhttp.send();
    }
}
    </script>   
</body>

</html>