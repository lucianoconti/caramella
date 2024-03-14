<?php
session_start();
include_once('php\conexion_database.php');
include_once('index.php');
if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
  }else if($_SESSION['acceso']==1){
    header("Location:./catalogo.php");
}
  $consulta = $database->query("SELECT Id_pedido, Id_usuario, fechaEntrega, estadoPedido FROM pedido ORDER BY fechaEntrega ASC");
  $resultadoConsulta = $consulta->fetch_all(MYSQLI_ASSOC);

  if(isset($_GET['id']) && !empty($_GET['id'])) {
    $idPedido = $_GET['id'];

    $query= "UPDATE pedido SET estadoPedido = 'Entregado' WHERE Id_pedido = $idPedido";
    
    $database->query($query);
    header("Location:./lista_entregar.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleBotones.css">
    <link rel="stylesheet" href="css/styleLista_entregar.css">
    <title>Gestion de productos</title>
</head>
<body>
    <main>
        <div>
            <h2>Lista de Productos a Entregar</h2>
            
            <table class="gestion_productos">
                <thead>
                    <th>
                        <tr>
                            <th>ID del Pedido</th>
                            <th>Nombre del Cliente</th>
                            <th>Telefono</th>
                            <th>Direccion de Entrega</th>
                            <th></th>
                        </tr>
                    </th>
                </thead>
                <tbody>
                    <?php
                        $fechaActual = (new DateTime())->format('Y-m-d');
                        foreach($resultadoConsulta as $fila){
                            $consulta2 = $database->query("SELECT telefono, direccion, CONCAT(nombreCliente, ' ', apellidoCliente) AS nombre_completo FROM usuario WHERE Id_usuario={$fila['Id_usuario']}");
                            $resultadoConsulta2 = $consulta2->fetch_assoc();
                            $fechaEntrega = (new DateTime($fila['fechaEntrega']))->format('Y-m-d');
                            if($fechaActual== $fechaEntrega && $fila['estadoPedido']=="En reparto"){
                    ?>
                    <tr>
                        <td><?php echo $fila['Id_pedido']; ?></td>
                        <td><?php echo $resultadoConsulta2['nombre_completo']; ?></td>
                        <td><?php echo $resultadoConsulta2['telefono']; ?></td>
                        <td><?php echo $resultadoConsulta2['direccion']; ?></td>
                        <td><?php
                                        echo '<button class="boton-estilo-1" onclick="return confirmar()"><a href="lista_entregar.php?id=' . $fila['Id_pedido'] . '">Finalizar</a></button>';
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
            var confirmacion = confirm("¿Cambiar estado del pedido a 'Entregado'?");

            if (confirmacion) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>