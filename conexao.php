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
$servername = "localhost";
$db_username = "Afonso";
$db_password = "AfonsoPAF2023";
$db_name = "boletimvacinas";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Conexão falhou." . "<br>". $conn->connect_error);
}
?>