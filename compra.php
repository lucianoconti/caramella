<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reposteria</title>
        <link rel="stylesheet" href="css/styleMenu.css">
        <link rel="stylesheet" href="css/styles.css">
        
        <script>
            function validar(){
                usu=document.frmIngreso.txtUsuario.value;
                pwd=document.frmIngreso.txtClave.value;
                if(usu=="admin"){
                    alert("ok");
                    if(pwd=="1234"){
                        document.frmIngreso.submit();
                    }
                        else{
                            alert("Contraseña incorrecta");
                            document.frmIngreso.txtClave.focus();
                        }
                }
                    else{
                        alert("Usuario incorrecto");
                        document.frmIngreso.txtUsuario.focus();
                }
            }
        </script>
    </head>
    <body>
        <header>
                <div class="header__superior">
                <div class="logo">
                    <img src="logo.webp" alt="logo">
                </div>
                <div class="search">
                    <input type="search" placeholder="¿Que torta buscas?">
                </div>
                </div>
                <div class="containter__menu">
                <div class="menu">
                    <nav>
                        <ul>
                          <li><a href="index.php">Catalogo</a></li>
                          <li><a href="compra.php">Contactanos</a></li>
                          <li><a href="#">Mis pedidos</a></li>
                          <li><a href="#">----</a></li>
                          <li><a href="#">Administradores</a>
                            <ul>
                              <li><a href="alta_clientes.php">Modificar catalogo</a></li>
                              <li><a href="#">Productos a elaborar</a></li>
                              <li><a href="#">Productos a entregar</a></li>
                              <li><a href="#">----</a></li>
                              <li><a href="#">----</a></li>
                            </ul>
                          </li>
                          <li id="login"><a href="#">Iniciar Sesion / Registrarse</a></li>
                        </ul>
                      </nav>
                </div>
                </div>
            </header>
        <main>
            <h1>Sistema Compra</h1>
            <br><br>
            <script align="center">
                document.write("Ingrese usuario y contraseña para usar el sistema");
                document.write("<br><br>")
            </script>
            <div class="container">
                <form name="frmIngreso" action="cliente_altas.html" method="post">
                    Usuario:<input type="text" name="txtUsuario">
                    <br><br>
                    Contraseña:<input type="password" name="txtClave">
                    <br><br>
                    <input type="button" value="Ingresar" onclick="validar()">
                </form>
            </div>
        </main>
    </body>
</html>