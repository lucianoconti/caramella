<?php
session_start();
include_once('conexion_database.php');

$email=$_POST['email'];
$contrasena=$_POST['contrasena'];



$verificarLogin=$database->query("select email,contrasena from usuario where email='$email'");


if($verificarLogin->num_rows > 0){
    $infomacionUsuario=$verificarLogin->fetch_assoc();
    if($infomacionUsuario["contrasena"]==$contrasena){
        $_SESSION['usuario']=$email;
        echo '<script>
                window.location="../index.php";
            </script>';

    }else{
        echo '<script>
                window.location="../login.php";
                alert("contraseña incorrecta");
            </script>';
        
    }
}else{
       echo '<script>
                window.location="../login.php";
                alert("Email invalido");
            </script>';
}
$verificarLogin->free();
$database->close();
?>