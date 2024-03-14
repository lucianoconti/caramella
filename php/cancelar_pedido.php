<?php
session_start();
include_once('conexion_database.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $idProducto = $_GET['id'];

    $query= "DELETE FROM pedido WHERE Id_pedido=$idProducto";
    
    $database->query($query);
    
    $mensaje = 'El producto se canceló exitosamente';
    $resultado = urlencode($mensaje);
    header("Location: ../mispedidos.php?msj=$resultado");
}
?>