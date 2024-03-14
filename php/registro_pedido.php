<?php
session_start();
include_once('conexion_database.php');
date_default_timezone_set('America/Argentina/Buenos_Aires');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = $_SESSION['usuario'];
    $idProducto = $_POST['idProducto'];
    $idEntrega = $_POST['envio'];
    $fechaEntrega= $_POST['fecha'];
    $total= $_POST['total'];
    $cantidad= $_POST['cantidad'];
    $aclaraciones =$_POST['aclaraciones'];
    $nyaCliente = $_POST['nombre'];
    $telefonoCliente = $_POST['telefono'];
    $direccionCliente = $_POST['direccion'];
    $fechaRealizacion = date('Y-m-d H:i:s');
    $estadoPedido= 'En preparación';
    $consulta = "INSERT INTO pedido(fechaRealizacion, fechaEntrega,total,cantidad,estadoPedido,aclaraciones,nyaCliente,telefonoCliente,direccionCliente,Id_usuario,Id_producto,Id_entrega) VALUES ('$fechaRealizacion','$fechaEntrega','$total','$cantidad','$estadoPedido','$aclaraciones','$nyaCliente','$telefonoCliente','$direccionCliente','$idUsuario','$idProducto','$idEntrega')";
    $resultadoConsulta = $database->query($consulta);
    if($resultadoConsulta){
        header("Location:../mispedidos.php");
    }else{
        header("Location:../catalogo.php");
    }
}
?>