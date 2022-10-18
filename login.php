<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLogin y Registro</title>
    <link rel="stylesheet" href="css/styleLogin.css">
</head>
<body>
    <?php
    include_once 'index.php'
    ?>
    <main>
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
                    <input type="text" placeholder="E-Mail" name="email">
                    <input type="text" placeholder="Contraseña" name="contrasena">
                    <button type="submit">Ingresar</button>
                    <p>¿Olvidaste la contraseña?</p>
                </form>
                <form action="php/registro_usuario.php" method="POST" class="formulario_register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="E-Mail" name="email">
                    <input type="text" placeholder="Nombre" name="nombre"> 
                    <input type="text" placeholder="Apellido" name="apellido">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <input type="password2" placeholder="Repetir contraseña" name="contrasena2">
                    <input type="text" placeholder="Telefono" name="telefono">
                    <input type="text" placeholder="Dirección" name="direccion"> 
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="js/scriptLogin-Register.js"></script>
</body>
</html>