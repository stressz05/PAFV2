<?php
    require "conexao.php";

    $age = $_POST['ageInput'];
    $ageType = $_POST['typeAge'];
    $name = $_POST[''];


    if($ageType == 'month'){
        $sql = "UPDATE animal SET Idade = '$age' AND Idade_Medida = 'Meses' WHERE NIF_Dono = '$nif'";
    } else {
        $sql = "UPDATE animal SET Idade = '$age' AND Idade_Medida = 'Anos' WHERE NIF_Dono = '$nif'";
    }
?>