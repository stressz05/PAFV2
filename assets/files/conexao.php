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