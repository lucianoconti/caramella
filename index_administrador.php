<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    
    <title>Caramella reposteria</title>
    <link rel="stylesheet" href="css/styleMenu.css">
   
  </head>
  
  <body>
    <header>
      <div class="header_superior">
        <div class="logo">
          <img src="logo.webp" alt="logo">
        </div>
        <div class="search">
          <input type="search" placeholder="¿Que torta buscas?">
        </div>
      </div>
      <div class="containter_menu">
        <div class="menu">
          <nav>
            <ul>
              <li><a href="index.php" >Catalogo</a></li>
              <li><a href="contacto.php">Contactanos</a></li>
              <li><a href="mispedidos.php">Mis pedidos</a></li>
              <li><a href="#">----</a></li>
              <li id="menu_administrador"><a href="#">Administradores</a>
                <ul>
                  <li><a href="alta_clientes.php">Modificar catalogo</a></li>
                  <li><a href="#">Productos a elaborar</a></li>
                  <li><a href="#">Productos a entregar</a></li>
                  <li><a href="#">----</a></li>
                  <li><a href="#">----</a></li>
                </ul>
              </li>
              <li id="login"><a href="login.php">Iniciar Sesion / Registrarse</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </body>
</html>
