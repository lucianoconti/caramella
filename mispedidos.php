<?php
session_start();

if(!isset($_SESSION['usuario'])){
    echo '<script>
        window.location="../login.php";
        </script>
        ';
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
        include_once('index.php');
    ?>
    <h3>hola</h3>
</body>
</html>