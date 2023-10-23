<?php
    //. ../../ usado para voltar duas pastas atrás, de forma a poder aceder ao arquivo conexao.php
    require "../../assets/files/conexao.php";

    $nif = $_GET['nif'];

    $sql = "DELETE FROM veterinario WHERE NIF_Vet = $nif";
    
    if($conn->query($sql) == true){
        header("Location: /Admin/aprovar.php");
    } else {
        echo "Erro ao recusar o pedido: " . $conn->error;
    }
?>