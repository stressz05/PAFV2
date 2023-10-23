<?php
    require "../../assets/files/conexao.php";

    $nif = $_GET['nif'];

    $sql = "UPDATE veterinario SET status = 'aprovado' WHERE NIF_Vet = $nif";
    
    if($conn->query($sql) == true){
        header("Location: /Admin/aprovar.php");
    } else {
        echo "Erro ao aceitar o veterinário: " . $conn->error;
    }
?>