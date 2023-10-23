<?php
    require "../../assets/files/conexao.php";

    $nif = $_GET['nif'];

    $sql = "DELETE FROM dono WHERE NIF_Dono = $nif";
    $sql_animal = "DELETE FROm animal WHERE NIF_Dono = $nif";
    
    if($conn->query($sql) == true && $conn->query($sql_animal) == true){
        header("Location: /Admin/apagar.php");
    } else {
        echo "Erro ao apagar o dono e o animal: " . $conn->error;
    }
?>