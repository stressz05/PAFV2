<?php
    require "../../assets/files/conexao.php";

    $nif = $_GET['nif'];

    $sql = "DELETE FROM veterinario WHERE NIF_Vet = $nif";
    $sql_animal = "UPDATE animal SET NIF_Vet = 0 WHERE NIF_Vet = $nif";
    
    if($conn->query($sql) == true && $conn->query($sql_animal) == true){
        header("Location: /Admin/apagarVet.php");
    } else {
        echo "Erro ao apagar o veterinário: " . $conn->error;
    }
?>