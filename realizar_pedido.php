<?php
session_start();
include_once('php/conexion_database.php');


if (!isset($_SESSION['usuario'])) {
    header("Location: ./login.php");
}else if(isset($_GET['id']) && !empty($_GET['id'])) {
    $idProducto = $_GET['id'];

    // obtengo los datos del producto de la bd
    $queryProducto = "SELECT * FROM producto WHERE Id_producto = $idProducto";
    $resultadoProducto = $database->query($queryProducto);

    if ($resultadoProducto->num_rows > 0) {
        $producto = $resultadoProducto->fetch_assoc();
    } else {
        // si ocurre un error pq el producto no esta
        header("Location: ./catalogo.php");
    }
} else {
    // si del get no se mando un ip de producto lo redirigo al catalogo
    header("Location: ./catalogo.php");
}
// obtengo los datos del cliente de la bs
$idUsuario=$_SESSION['usuario'];
$queryUsuario = "SELECT * FROM usuario WHERE Id_usuario='$idUsuario'";
$resultadoUsuario = $database->query($queryUsuario);
$datosUsuario = $resultadoUsuario->fetch_assoc();
// obtengo las imagenes del producto de la bd para mostrar
$queryImagenes = "SELECT nombreFoto FROM fotoproducto WHERE Id_producto = $idProducto";
$resultadoImagenes = $database->query($queryImagenes);
$imagenes = array();

while ($imagen = $resultadoImagenes->fetch_assoc()) {
    $imagenes[] = $imagen['nombreFoto'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <title>Detalle del Producto</title>
</head>
<?php
include_once('index.php');
?>
<body>
    <main>
            <div class="producto-detalle">
                <form class="realizar-pedido" action="php/registro_pedido.php" method="POST" onsubmit="return confirmarPedido()">
                    <h2><?php echo $producto['nombreProducto']; ?></h2>
                    <input type="hidden" name="idProducto" value="<?php echo $producto['Id_producto']; ?>">
                    <div class="slick-slider">
                        <?php foreach ($imagenes as $imagen) { ?>
                            <div class="slick-slide">
                                <img src="<?php echo $imagen; ?>" alt="<?php echo $producto['nombreProducto']; ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <label for="descripcion" class="producto-label">Descripción:</label>
                    <p><?php echo $producto['descripcion']; ?></p>
                    <br>
                    <label>Cantidad:</label>
                    <input type="radio" name="cantidad" value="1" onchange="calcularTotal()" checked> 1<br>
                    <input type="radio" name="cantidad" value="2" onchange="calcularTotal()"> 2<br>
                    <input type="radio" name="cantidad" value="3" onchange="calcularTotal()"> 3<br><br>

                    <label>Tipo de envío:</label>
                    <input type="radio" name="envio" value="1" onchange="calcularTotal()"checked> Retiro en el local<br>
                    <input type="radio" name="envio" value="2"onchange="calcularTotal()"> Envío a domicilio($300)<br>

                    <label for="fecha">Fecha de entrega:</label>
                    <input type="date" name="fecha" id="fecha" min="<?php echo date('Y-m-d', strtotime('+3 days')); ?>" max="<?php echo date('Y-m-d', strtotime('+2 weeks')); ?>" inputmode="monthday" required><br>

                    <label for="aclaraciones">Aclaraciones:</label>
                    <textarea name="aclaraciones" id="aclaraciones" rows="4" cols="50" maxlength="250"></textarea><br>

                    <label for="nombre">Nombre y Apellido:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $datosUsuario['nombreCliente'].' '.$datosUsuario['apellidoCliente'] ?>" required><br>

                    <label for="telefono">Teléfono del Usuario:</label>
                    <input type="tel" name="telefono" id="telefono" value="<?php echo $datosUsuario['telefono'] ?>" required><br>

                    <label for="direccion">Dirección de entrega:</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $datosUsuario['direccion'] ?>" required><br>
                    <label>TOTAL:</label>
                    <input type="hidden" name="total" id="totalInput" value="">
                    <a>$</a>
                    <span id="total">0</span><br><br>
                    <input type="submit" value="Confirmar Pedido">
                </form>
            </div>
        
    </main>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.slick-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                prevArrow: '<div class="slick-prev"></div>',
                nextArrow: '<div class="slick-next"></div>',
            });
        });
        function confirmarPedido() {
            var confirmacion = confirm("¿estás seguro de que deseas realizar el pedido?");

            if (confirmacion) {
                return true;
            } else {
                return false;
            }
        }
        function calcularTotal() {
        // obtengo el valor de la cantidad de productos seleccionados
        var cantidad = parseInt(document.querySelector('input[name="cantidad"]:checked').value);
            valorProducto= <?php echo $producto['valorProducto'] ?>;

        // obtengo el valor del envio seleccionado
        var envio = document.querySelector('input[name="envio"]:checked').value;

        var total = valorProducto * cantidad;
        if (envio === '2') {
            total = total + 300; 
        }

        // se actualiza el valor de "total" en el form
        document.getElementById('total').textContent = total;
        document.getElementById('totalInput').value = total;
    }
    // llamo a la funcion para calcular el total al cargar la pagina
    calcularTotal();
    
    </script>
    <link rel="stylesheet" href="css/styleRealizar_pedido.css">
</body>
</html>