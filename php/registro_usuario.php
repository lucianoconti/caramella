<?php
    session_start();
    include_once('conexion_database.php');
    $email=$_POST['email'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $contrasena=$_POST['contrasena'];
    $contrasena2=$_POST['contrasena2'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];

    if(!($contrasena!=$contrasena2)){
        $verificarRegistro=$database->query("select * from usuario where email='$email'");
        if($verificarRegistro->num_rows > 0){
            header("Location:../login.php?error_r=email_registrado");
        }else{
            $queryRegistro=$database->query("Insert into usuario(Id_tipoUsuario,nombreCliente,apellidoCliente,email,contrasena,telefono,direccion,fechaRegistro) 
                    values (1,'$nombre','$apellido','$email','$contrasena','$telefono','$direccion',NOW())");
            if($queryRegistro){
                $mensaje = 'El usuario se registró exitosamente';
                $resultado = urlencode($mensaje);
                header("Location: ../login.php?msj=$resultado");
            }
    }
}else{
    header("Location:../login.php?error_r=contrasena_invalida");
}
$database->close();
?>