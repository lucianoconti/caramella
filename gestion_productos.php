<?php
session_start();
include_once('php\conexion_database.php');
if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
  }else{
    if($_SESSION['acceso']==2){
        include_once('index_administrador.php');
    }else{
      header("Location:./index.php");
    }
  }

$consulta=$database->query("SELECT Id_producto,nombreProducto,valorProducto,descripcion FROM producto ORDER BY Id_producto ASC");
$resultadoConsulta=$consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleAdministrador.css">
    <title>Gestion de productos</title>
</head>
<body>
    <main>
        <div>
            <h2>Productos</h2>
            <a href="alta_producto.php">Agregar producto</a>
            <table class="gestion_productos">
                <thead>
                    <th>
                        <tr>
                            <th>ID del Producto</th>
                            <th>Nombre del Producto</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>#</th>
                            <th>#</th>
                            </tr>
                    </th>
                </thead>
                <tbody>
                    <?php
                        foreach($resultadoConsulta AS $fila){
                    ?>
                    <tr>
                        <td><?php echo $fila['Id_producto']; ?></td>
                        <td><?php echo $fila['nombreProducto']; ?></td>
                        <td><?php echo $fila['valorProducto']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['Id_producto']; ?></td>
                        <td><?php echo $fila['Id_producto']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>