<html>
    <head>
        <meta charset="utf-8">
        <title>Altas Cliente</title>
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="css/styleMenu.css">
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
            <table>
                <h1>Altas de clientes</h1>
                <br>
                <p>Módulo para cargar nuevos clientes</p> 
                <p> 
                    <form name="frmCarga" method="get" action="cliente_altas.html">
                        <div class="container">
                            <div>Razon Social:<input type="text" name="txtRazonSocial" placeholder="Razon Social:"></div>
                            <br>
                            <div class="element">Correo electronico:<input type="text" name="txtCorreo" placeholder="Correo Electronico:"></div>
                            <br>
                            <div class="element">Es consumidor final? <input type="checkbox" name="chkConsumidorFinal"></div>
                            <br>
                            <div class="element">Elija la Condición Fiscal</div>
                                <select class="element" name="sltCF">
                                    <option value="0">Consumidor Final</option>
                                    <option value="RI">Responsable Inscripto</option>
                                    <option value="2">Exento</option>
                                    <option value="99">No quiere pagar impuestos</option>
                                </select>
                            <br>
                            <div class="element">Observaciones <input type="text" placeholder="Observaciones"></div>
                            <br>
                            <div class="inputContainer">
                            <div>Como prefiere ser contactado? <p></p>
                                <input type="radio" id="CorreoElectronico" name="contact_fav" value="Correo Electronico">
                                <label for="Correo Electronico">Correo Electronico  </label> <br>
                                <input type="radio" id="WhatsApp" name="contact_fav" value="WhatsApp"> 
                                <label for="WhatsApp">WhatsApp</label> <br>
                                <input type="radio" id="Telefono" name="contact_fav" value="Telefono">
                                <label for="telefono">Telefono</label> <br> 
                                <input type="radio" id="Telegram" name="contact_fav" value="Telegram">
                                <label for="telegram">Telegram</label> <br> 
                                <input type="radio" id="DomicilioPostal" name="contact_fav" value="Domicilio Postal">
                                <label for="Domicilio Postal">Domicilio Postal</label> <br>
                                <br>
                                <div class="element">
                                    <input type="submit" name="btnConfirmar" value="Confirmar">
                                </div>
                                <div class="element">
                                    <input type="reset" name="btnBorrar" value="Borrar Contenido">
                                </div>
                            </div>
                        </div>
                    </form>
                </p>
    </main>
    </body>
</html>