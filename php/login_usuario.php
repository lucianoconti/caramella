<?php
session_start();
include_once('conexion_database.php');

$email=$_POST['email'];
$contrasena=$_POST['contrasena'];



$verificarLogin=$database->query("select email,contrasena,nombreCliente,Id_tipoUsuario from usuario where email='$email'");


if($verificarLogin->num_rows > 0){
    $infomacionUsuario=$verificarLogin->fetch_assoc();
    if($infomacionUsuario["contrasena"]==$contrasena){
        $_SESSION['usuario']=$email;
        $_SESSION['acceso']=$infomacionUsuario['Id_tipoUsuario'];       
        if($_SESSION['acceso']==1){           
            header("Location:../index.php");
        }else{
            header("Location:../index_administrador.php");
        }
    }else{
        header("Location:../login.php");
    }
}else{
        header("Location:../login.php");
        echo '<script>
                alert("Email invalido");
            </script>';
}
$verificarLogin->free();
$database->close();
?>