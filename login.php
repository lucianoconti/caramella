<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="css/styleLogin.css">
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
    <?php
            include_once('index.php');

    ?>
    <main>
        <h1 id="alerta">
            <?php
                if (isset($_GET['msj'])) {
                    $mensaje = urldecode($_GET['msj']);
                    echo '<script> mostrarError("' . $mensaje . '"); </script>';
                }
            ?>
        </h1>
        <div class="contenedor_todo">
            <div class="caja_trasera">
                <div class="caja_trasera_login">
                    <h3>¿Ya tiene una cuenta?</h3>
                    <p>Iniciar sesión para entrar en la pagina</p>
                    <button id="btn_iniciar-sesion">Iniciar Sesion</button>
                </div>
                <div class="caja_trasera_register">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesión</p>
                    <button id="btn_registrarse">Registrarse</button>
                </div>
            </div>
            <div class="contenedor_login-register">
                <form action="php/login_usuario.php" method="POST" class="formulario_login">
                    <h2>Iniciar Sesión</h2>
                    <div class="mensaje_error">
                        <?php
                            if (isset($_GET['error_l'])) {
                                $error = $_GET['error_l'];
                                switch ($error)
                                {
                                case "email_invalido":
                                    echo 'El email no existe';
                                    break;
                                case "contrasena_invalida":
                                    echo 'La contraseña es incorrecta';
                                    break;
                                }
                            }
                        ?>
                    </div>
                    <input type="text" placeholder="E-Mail" name="email">
                    <br>
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button type="submit">Ingresar</button>
                </form>
                <form action="php/registro_usuario.php" method="POST" class="formulario_register">
                    <h2>Registrarse</h2>
                    <div class="mensaje_error">
                        <?php
                            if (isset($_GET['error_r'])) {
                                $error = $_GET['error_r'];
                                switch ($error)
                                {
                                case "email_registrado":
                                    echo 'El email ya es encuentra en uso';
                                    break;
                                case "contrasena_invalida":
                                    echo 'Las contraseñas no coinciden';
                                    break;
                                }
                            }
                        ?>
                    </div>
                    <input type="text" placeholder="E-Mail" name="email" required>
                    <input type="text" placeholder="Nombre" name="nombre" required> 
                    <input type="text" placeholder="Apellido" name="apellido" required>
                    <input type="password" placeholder="Contraseña" name="contrasena" required>
                    <input type="password" placeholder="Repetir contraseña" name="contrasena2" required>
                    <input type="text" placeholder="Telefono" name="telefono" required>
                    <input type="text" placeholder="Dirección" name="direccion" required> 
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="js/scriptLogin-Register.js"></script>
    <?php
        if (isset($_GET['error_r'])) {
            echo '<script>register();</script>';
        }
    ?>
</body>
</html>