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
      </div>
      <div class="containter_menu">
        <div class="menu">
          <nav>
            <ul>
              <li><a href="catalogo.php" >Catalogo</a></li>
              <li><a href="mispedidos.php">Mis pedidos</a></li>
              <li><a style: text-decoration:none; href="#">----</a></li>
              <?php
              if(isset($_SESSION['usuario']) && ($_SESSION['acceso']==2 || ($_SESSION['acceso']==3))){
                echo '<li id="menu_administrador"><a style: text-decoration:none;href="#">Administradores</a>';
                  echo '<ul>';
                    if(($_SESSION['acceso']==2)){
                      echo '<li><a href="gestion_productos.php">Modificar catalogo</a></li>';
                      echo '<li><a href="lista_elaborar.php">Productos a elaborar</a></li>';
                      echo '<li><a href="lista_entregar.php">Productos a entregar</a></li>';
                    }else if($_SESSION['acceso']==3){
                      echo '<li><a href="lista_entregar.php">Productos a entregar</a></li>';
                    }
                  echo '</ul>';
                echo '</li>';
              }
              if(isset($_SESSION['usuario'])){
                echo '<li><a id="login" href="php/logout_usuario.php">Cerrar Sesion</a></li>';
              }else{
                echo '<li><a id="login" href="login.php">Iniciar Sesion / Registrarse</a></li>';
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </body>
</html>
