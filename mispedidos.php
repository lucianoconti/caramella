<?php
session_start();
include_once('php\conexion_database.php');
include_once('index.php');
if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
    
  }
  

$auxId_usuario = $_SESSION['usuario'];
$consulta = $database->query("SELECT pedido.Id_pedido, pedido.fechaRealizacion, pedido.fechaEntrega, producto.nombreProducto, pedido.cantidad, pedido.total, pedido.aclaraciones, pedido.Id_entrega, entrega.tipoEntrega, pedido.direccionCliente, pedido.estadoPedido FROM pedido LEFT JOIN producto ON pedido.Id_producto = producto.Id_producto LEFT JOIN entrega ON pedido.Id_entrega = entrega.Id_entrega LEFT JOIN usuario ON pedido.Id_usuario = usuario.Id_usuario WHERE usuario.Id_usuario = $auxId_usuario ORDER BY pedido.fechaRealizacion DESC;");
$resultadoConsulta = $consulta->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleBotones.css">
    <link rel="stylesheet" href="css/styleMispedidos.css">
    <title>Gestion de productos</title>
</head>
<script>
    function mostrarError(mensaje) {
                console.log("Mensaje de error:", mensaje);
                var alertaPersonalizada = document.getElementById("alerta");
                alertaPersonalizada.textContent = mensaje;
    
                alertaPersonalizada.style.display = "block";
    
                setTimeout(function () {
                    alertaPersonalizada.style.display = "none";
                }, 3500);
            }
    
</script>

<body>
    <main>
        <div>
            <h1 id="alerta">
                <?php
                    if (isset($_GET['msj'])) {
                        $mensaje = urldecode($_GET['msj']);
                        echo '<script> mostrarError("' . $mensaje . '"); </script>';
                    
                    }
                ?>
            </h1>
            <br><br>
            <h2>Pedidos Realizados</h2>
            <table class="gestion_productos">
                <thead>
                    <th>
                        <tr>
                            <th>Nro de pedido</th>
                            <th>Fecha de realizacion del pedido</th>
                            <th>Fecha de entrega</th>
                            <th>Nombre del producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Aclaraciones</th>
                            <th>Tipo de entrega</th>
                            <th>Direccion de entega</th>
                            <th>Estado del pedido</th>
                            <th></th>
                        </tr>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($resultadoConsulta as $fila) { ?>
                        <tr>
                            <td><?php echo $fila['Id_pedido']; ?></td>
                            <td><?php $fechaRealizacion = new DateTime($fila['fechaRealizacion']);
                                    echo $fechaRealizacion->format('d-m-Y');  
                                ?>
                            </td>
                            <td><?php
                                    $fechaEntrega = new DateTime($fila['fechaEntrega']);
                                    echo $fechaEntrega->format('d-m-Y'); 
                                    ?>
                            </td>
                            <td><?php echo $fila['nombreProducto']; ?></td>
                            <td><?php echo $fila['cantidad']; ?></td>
                            <td>$<?php echo $fila['total']; ?></td>
                            <td><?php echo $fila['aclaraciones']; ?></td>
                            <?php if ($fila['Id_entrega'] == 1) { ?>  
                                <td><?php echo $fila['tipoEntrega']; ?></td>
                                <td></td>
                            <?php } else { ?>
                                <td><?php echo $fila['tipoEntrega']; ?></td>
                                <td><?php echo $fila['direccionCliente']; ?></td>
                            <?php } ?>
                            <td><?php echo $fila['estadoPedido']; ?></td>
                            <td><?php
                                    $fechaActual = new DateTime(); 
                                    
                                    $diferencia = $fechaActual->diff($fechaRealizacion);
                                    if ($diferencia->h <= 12 && $diferencia->days == 0 && $fila['estadoPedido']=='En preparación') {
                                        echo '<button class="boton-estilo-1" onclick="return confirmarBorrado()"><a href="php/cancelar_pedido.php?id=' . $fila['Id_pedido'] . '">Cancelar Pedido</a></button>';
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
     
        function confirmarBorrado() {
            var confirmacion = confirm("¿Estás seguro de que deseas cancelar este pedido?");

            if (confirmacion) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>