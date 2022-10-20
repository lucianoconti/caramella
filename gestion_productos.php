<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location:./login.php");
  }else{
    if($_SESSION['acceso']==2){
        include_once('index_administrador.php');
    }else{
      header("Location:./index.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de productos</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <button>Hola</button>
        </form>
    </main>
</body>
</html>