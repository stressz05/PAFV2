<?php 
    require "assets/files/verificacao.php";
    if(isset($_SESSION['loggedin'])){
        if($_SESSION['tipoUser'] === 'dono'){
            header("Location: assets/files/acessonegado.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>BV / Painel</title>
</head>
<body class="body">
    <?php include "assets/files/navbar.php" ?>
    <div class="centered">
        <p class="p">PAINEL DO ANIMAL</p>
    </div>

    <?php include "assets/files/footer.php" ?>
</body>
</html>