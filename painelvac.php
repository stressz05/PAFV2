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
    <title>BV / Painel</title>
</head>
<body>
<?php include "assets/files/navbar.php" ?>

<?php include "assets/files/footer.php" ?>
</body>
</html>