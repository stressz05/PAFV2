<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['tipoUser'] != 'admin'){
        session_destroy();
        header("Location: /");
    }
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BV / Admin</title>
    <link rel="stylesheet" href="/stylesheet.css">
</head>

<body class="body">
    <div class="centered">
        <p class="p">Bem vindo ao painel de Admin!</p>
    </div>

    <div class="centered">
        <div class="blockAdmin">
            <div class="colAdmin">
                <p class="labelAdmin">Aprovar Veterinários</p>
                <p class="pAdmin">Aqui poderá aprovar veterinários que se queiram registar no site.</p>
                <p class="centered"><a href="aprovar.php" class="btnAdmin">Aprovar</a></p>
            </div>
            <div class="colAdmin">
                <p class="labelAdmin">Apagar Veterinários</p>
                <p class="pAdmin">Aqui poderá apagar veterinários que já não usem o site.</p>
                <p class="centered"><a href="apagarVet.php" class="btnAdmin">Apagar</a></p>
            </div>
            <div class="colAdmin">
                <p class="labelAdmin">Apagar Donos e Animais</p>
                <p class="pAdmin">Aqui poderá apagar donos e animais que já não usem o site.</p>
                <p class="centered"><a href="apagar.php" class="btnAdmin">Apagar</a></p>
            </div>
        </div>
    </div>

    <div class="centered">
        <a href="/assets/files/logout.php" class="btnAdmin" style="margin-top: 0; margin-bottom: 50px;">Logout</a>
    </div>

    <?php include "../assets/files/footer.php"; ?>
</body> 
</html>