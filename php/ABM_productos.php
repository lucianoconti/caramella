<?php
session_start();
include_once('conexion_database.php');

if(isset($_POST['boton_ABM'])){
$accion = $_POST['boton_ABM'];
if($accion=='A'){
    // verifico si se envio el formulario de alta de producto
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // obtengo los datos del formulario
        $nombreProducto = $_POST['nombreProducto'];
        $valorProducto = $_POST['valorProducto'];
        $descripcion = $_POST['descripcion'];
    
        // carga de las imagenes 
        $imagenes = $_FILES['imagenes']; // array de archivos subidos
    
        // guarda el producto en la bd
        $query = "INSERT INTO producto (nombreProducto, valorProducto, descripcion) VALUES ('$nombreProducto', '$valorProducto', '$descripcion')";
        $resultado = $database->query($query);
    
        if ($resultado) {
            $idProducto = $database->insert_id; 
    
            //guarda las imagenes en una carpeta y las asocia la producto en la bd
            $numImagenes = count($imagenes['name']);
            for ($i = 0; $i < $numImagenes; $i++) {
                $imagen = $imagenes['tmp_name'][$i];
                $imagenNombre = $imagenes['name'][$i];
                $rutaImagen = '../img/' . $idProducto . '_' . $imagenNombre;
                move_uploaded_file($imagen, $rutaImagen);
                $rutaImagen = 'img/' . $idProducto . '_' . $imagenNombre;
                // guardo la referencia de la imagen en la tabla fotosproducto
                $queryImagen = "INSERT INTO fotoproducto (Id_producto, nombreFoto) VALUES ('$idProducto', '$rutaImagen')";
                $resultadoImagen = $database->query($queryImagen);
    
                if (!$resultadoImagen) {
                    // error al guardar las imaenes del producto
                    $error = "Ocurrió un error al agregar una de las imágenes del producto.";
                    break;
                }
            }
    
            if (!isset($error)) {
                // si no hay ningun error redirigo a la página de gestión de productos
                header("Location: ../gestion_productos.php");
                exit();
            }
        } else {
            // terminar que pasa si ocurre un error
            $error = "Ocurrió un error al agregar el producto.";
        }
    }
}else if($accion=='M'){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // obtengo los datos del formulario
        $idProducto = $_POST['idProducto'];
        $nombreProducto = $_POST['nombreProducto'];
        $valorProducto = $_POST['valorProducto'];
        $descripcion = $_POST['descripcion'];
        $imagenes = $_FILES['imagenes'];
        // se actualiza en la base de datos
        $query = "UPDATE producto SET nombreProducto = '$nombreProducto', valorProducto = '$valorProducto', descripcion = '$descripcion' WHERE Id_producto = $idProducto";
        $resultado = $database->query($query);
        
        $numImagenes = count($imagenes['name']);
            for ($i = 0; $i < $numImagenes; $i++) {
                $imagen = $imagenes['tmp_name'][$i];
                $imagenNombre = $imagenes['name'][$i];
                $rutaImagen = '../img/' . $idProducto . '_' . $imagenNombre;
                move_uploaded_file($imagen, $rutaImagen);
                $rutaImagen = 'img/' . $idProducto . '_' . $imagenNombre;
                // guardo la referencia de la imagen en la tabla fotosproducto
                $queryImagen = "INSERT INTO fotoproducto (Id_producto, nombreFoto) VALUES ('$idProducto', '$rutaImagen')";
                $resultadoImagen = $database->query($queryImagen);
    
                if (!$resultadoImagen) {
                    // error al guardar las imaenes del producto
                    $error = "Ocurrió un error al agregar una de las imágenes del producto.";
                    break;
                }
            }

    }
    if ($resultado) {
        header("Location: ../gestion_productos.php");
        exit();
    } else {
        echo "Ocurrió un error al modificar el producto.";
        }


}else if($accion==='B'){
    $idProducto = $_POST['idProducto'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $eliminaFotos = "DELETE FROM fotoproducto WHERE Id_producto = $idProducto";
        $resultado = $database->query($eliminaFotos);
        $eliminaProducto = "DELETE FROM producto WHERE Id_producto = $idProducto";
        $resultado = $database->query($eliminaProducto);
        if ($resultado) {
            // el producto se borro correctamente
            header("Location: ../gestion_productos.php");
            exit();
            echo "El producto con ID $idProducto se eliminó correctamente.";
        } else {
            // error al eliminar el producto(buscar donde redirigir)
            echo "Ocurrió un error al eliminar el producto.";
            }
    }
}
}else if(isset($_GET['idFoto'])) {
    $idFoto = $_GET['idFoto'];
    $queryFoto = "SELECT nombreFoto FROM fotoProducto WHERE Id_fotoProducto=$idFoto";
    $resultado = $database->query($queryFoto);
    $foto = $resultado->fetch_assoc();
    $rutaFoto = '../' .$foto['nombreFoto'];
    $queryeliminoFoto = "DELETE FROM fotoProducto WHERE Id_fotoProducto = $idFoto";
    $resultado2 = $database->query($queryeliminoFoto);

    if (file_exists($rutaFoto)) {
        unlink($rutaFoto);
        echo "Foto eliminada";
    }else{
        echo "Ocurrió un error al eliminar la foto";
    }
}

