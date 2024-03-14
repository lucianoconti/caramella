<?php
session_start();
include_once('php\conexion_database.php');
include_once('index.php');
if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
  }else if($_SESSION['acceso']==1){
    header("Location:./catalogo.php");
}else if($_SESSION['acceso']==3){
    header("Location:./lista_entregar.php");
}
  $consulta = $database->query("SELECT Id_pedido, Id_producto, cantidad, aclaraciones, fechaEntrega, fechaRealizacion, estadoPedido FROM pedido ORDER BY fechaEntrega, fechaRealizacion ASC");
  $resultadoConsulta = $consulta->fetch_all(MYSQLI_ASSOC);
  if(isset($_GET['id']) && !empty($_GET['id'])) {
    $idPedido = $_GET['id'];

    $query= "UPDATE pedido SET estadoPedido = 'En reparto' WHERE Id_pedido = $idPedido";
    
    $database->query($query);
    header("Location:./lista_elaborar.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLista_elaborar.css">
    <link rel="stylesheet" href="css/styleBotones.css">
    <title>Gestion de productos</title>
</head>
<body>
    <main>
        <div>
            <h2>Lista de Productos a Elaborar</h2>
            
            <table class="gestion_productos">
                <thead>
                    <th>
                        <tr>
                            <th>ID del Pedido</th>
                            <th>Nombre del Producto</th>
                            <th>Cantidad</th>
                            <th>Aclaraciones</th>
                            <th>Fecha de Entrega</th>
                            <th>Fecha de Realizacion</th>
                            <th></th>
                        </tr>
                    </th>
                </thead>
                <tbody>
                    <?php
                        $fechaActual = (new DateTime())->format('Y-m-d');
                        foreach($resultadoConsulta as $fila){
                            $consulta2 = $database->query("SELECT nombreProducto FROM producto WHERE Id_producto={$fila['Id_producto']}");
                            $resultadoConsulta2 = $consulta2->fetch_assoc();
                            $fechaRealizacion = new DateTime($fila['fechaRealizacion']);
                            $fechaEntrega = new DateTime($fila['fechaEntrega']);
                            if($fechaActual<=$fechaEntrega->format('Y-m-d') && $fila['estadoPedido']=="En preparación"){
                    ?>
                    <tr>
                        <td><?php echo $fila['Id_pedido']; ?></td>
                        <td><?php echo $resultadoConsulta2['nombreProducto']; ?></td>
                        <td><?php echo $fila['cantidad']; ?></td>
                        <td><?php echo $fila['aclaraciones']; ?></td>
                        <td><?php echo $fechaEntrega->format('d-m-Y'); ?></td>
                        <td><?php echo $fechaRealizacion->format('d-m-Y'); ?></td>
                        <td><?php
                                        echo '<button class="boton-estilo-1" onclick="return confirmar()"><a href="lista_elaborar.php?id=' . $fila['Id_pedido'] . '">Finalizar</a></button>';                                   
                            ?>
                        </td>
                    </tr>
                    <?php   }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function confirmar() {
            var confirmacion = confirm("¿Confirmar finalizacion del pedido?");

            if (confirmacion) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>