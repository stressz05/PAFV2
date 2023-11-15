<?php
    require "../../assets/files/conexao.php";

    $nif = $_GET['nif'];
    $data = date("d-m-Y"); //? Gera a data de quando o veterinário foi aceite para substituir pela anterior.

    $sql = "UPDATE veterinario SET status = 'aprovado', Data_Pedido = '$data' WHERE NIF_Vet = $nif";
    
    if($conn->query($sql) == true){
        header("Location: /Admin/aprovar.php");
    } else {
        echo "Erro ao aceitar o veterinário: " . $conn->error;
    }
?>