<?php
    include_once('conexion_database.php');
    $email=$_POST['email'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $contrasena=$_POST['contrasena'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];

//Verificar que el email no se repita
    $verificarRegistro=$database->query("select * from usuario where email='$email'");
    if($verificarRegistro->num_rows > 0){
        echo    '<script>
                    alert("Este correo ya pertenece a un usuario");
                    window.location="../login.php";
                </script>';
        $verificarRegistro->free();
    }else{
        $queryRegistro=$database->query("Insert into usuario(Id_tipoUsuario,nombreCliente,apellidoCliente,email,contrasena,telefono,direccion) 
                values (1,'$nombre','$apellido','$email','$contrasena','$telefono','$direccion')");
        if($queryRegistro){
            echo '<script>
                    window.location="../login.php";
                    alert("Usuario almacenado exitosamente");
                </script>';
        }
        $queryRegistro->free();
}
$database->close();
?>