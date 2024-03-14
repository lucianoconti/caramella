<?php
session_start();
include_once('conexion_database.php');

$email=$_POST['email'];
$contrasena=$_POST['contrasena'];



$verificarLogin=$database->query("SELECT email,contrasena,nombreCliente,Id_tipoUsuario,Id_usuario from usuario where email='$email'");


if($verificarLogin->num_rows > 0){
    $infomacionUsuario=$verificarLogin->fetch_assoc();
    if($infomacionUsuario["contrasena"]==$contrasena){
        $_SESSION['usuario']=$infomacionUsuario['Id_usuario'];
        $_SESSION['acceso']=$infomacionUsuario['Id_tipoUsuario'];       
        if($_SESSION['acceso']==1){           
            header("Location:../catalogo.php");
        }else if($_SESSION['acceso']==2){
            header("Location:../gestion_productos.php");
        }else if($_SESSION['acceso']==3){
            header("Location:../lista_entregar.php");
        }
        
    }else{
        header("Location:../login.php?error_l=contrasena_invalida");
    }
}else{
    header("Location:../login.php?error_l=email_invalido");
}
$verificarLogin->free();
$database->close();
?>