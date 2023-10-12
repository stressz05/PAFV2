<?php
    require "conexao.php";

    $id_animal = $_GET['id_animal'];

    $sql = "UPDATE animal SET NIF_Vet = 0 WHERE ID_Animal = $id_animal";

    if($conn->query($sql) == true){
        header("Location: /animais.php");
    } else {
        echo "Erro ao remover o animal: " . $conn->error;
    }
?>