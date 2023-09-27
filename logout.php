<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
    <title>BV | Logout</title>
</head>

<body class="body">
    <div>
        <img class="logo" src="assets\imagens\logo2.png" alt="Logo do site" title="Logo">
    </div>
</body>

<footer class="footer">
    Boletim de vacinas &copy; Afonso Almeida 2023
</footer>

</html>

<?php
session_start();
session_destroy();
echo '<div class="centered">Logout efetuado com sucesso!</div>'
    . '<br>' . '<a class="centered" href="/">Voltar ao Início</a>';
?>