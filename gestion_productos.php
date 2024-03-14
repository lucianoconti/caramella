<?php
session_start();
include_once('php\conexion_database.php');
include_once('index.php');
if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
  }else if($_SESSION['acceso']==1 || $_SESSION['acceso']==3){
    header("Location:./catalogo.php");
}
  $consulta = $database->query("SELECT Id_producto, nombreProducto, valorProducto, descripcion FROM producto ORDER BY Id_producto ASC");
  $resultadoConsulta = $consulta->fetch_all(MYSQLI_ASSOC);
  $consulta2 = $database->query("SELECT * FROM entrega");
  $resultadoConsulta2 = $consulta2->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleGestion_productos.css">
    <link rel="stylesheet" href="css/styleBotones.css">
    <title>Gestion de productos</title>
</head>
<body>
    <main>
        <div>
            <h2>Lista de Productos</h2>
            <a class="boton-agregar-producto" href="alta_producto.php">Agregar producto</a>
            <table class="gestion_productos">
                <thead>
                    <th>
                        <tr>
                            <th>ID del Producto</th>
                            <th>Nombre del Producto</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Modificar</th>
                            <th>Borrar</th>
                            </tr>
                    </th>
                </thead>
                <tbody>
                    <?php
                        foreach($resultadoConsulta as $fila){
                    ?>
                    <tr>
                        <td><?php echo $fila['Id_producto']; ?></td>
                        <td><?php echo $fila['nombreProducto']; ?></td>
                        <td>$<?php echo $fila['valorProducto']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td>
                            <form method="POST" action="modificar_producto.php">
                                <input type="hidden" name="idProducto" value="<?php echo $fila['Id_producto']; ?>">
                                <button class="boton-estilo-1" type="submit" name="boton">X</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="php/ABM_productos.php" onsubmit="return confirmarBorrado()">
                                <input type="hidden" name="idProducto" value="<?php echo $fila['Id_producto']; ?>">
                                <button class="boton-estilo-1" type="submit" name="boton_ABM" value="B" >X</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function confirmarBorrado() {
            var confirmacion = confirm("¿Estás seguro de que deseas eliminar este producto?");

            if (confirmacion) {
                return true;
            } else {
                return false;
            }
        }
    </script>   
</body>
</html>