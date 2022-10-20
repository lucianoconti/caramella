<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SESSION['acceso']==2){
            include_once('index_administrador.php');
        }else{
            include_once('index.php');
        }
    ?>
    <main>
        <h3>hola</h3>
        
    </main>
</body>
</html>