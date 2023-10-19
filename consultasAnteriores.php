<?php
require "assets/files/verificacao.php";
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['tipoUser'] === 'dono') {
        header("Location: assets/files/acessonegado.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>BV / Consultas</title>
</head>

<body class="body">
    <?php include "assets/files/navBar.php"; ?>
    <div class="centered" style='margin-top: 30px; margin-bottom: 0'>
        <p class="p">Consultas Anteriores</p>
    </div>

    <?php
        require "assets/files/conexao.php";

        $id = $_GET['id'];
        
        $sqlNome = "SELECT Nome FROM animal WHERE ID_Animal = '$id'";
        $sqlNome_query = $conn->query($sqlNome);

        if($sqlNome_query == true){
            $linhasNome = $sqlNome_query->fetch_assoc();
            $nome = $linhasNome['Nome'];
        }

        $sql = "SELECT * FROM consulta WHERE ID_Animal = '$id'";
        $sql_query = $conn->query($sql);

        if($sql_query == true){
        
            while($linhas = $sql_query->fetch_assoc()){
                $nomeVac = $linhas['Nome_Vacina'];
                $descVac = $linhas['Descricao_Vacina'];
                $peso = $linhas['Peso'];
                $data = $linhas['Data'];
                $obs = $linhas['Observacoes'];

                echo "<div class='centeredCon'>";
                echo "<div class='containerPainel'>";
                echo "<div class='left'>";
                echo "<p class='pBlocks'><strong>Nome: </strong>" . $nome . "</p>";
                echo "<p class='pBlocks'><strong>Nome Vacina: </strong><br><input style='font-weight: 600; color: black' class='input' placeholder='$nomeVac' disabled>" . "</input></p>";
                echo "<p class='pBlocks'><strong>Data de Administração: </strong><br><input style='font-weight: 600; color: black' class='input' placeholder='$data' disabled>" . "</input></p>";
                echo "<p class='pBlocks'><strong>Descrição da Vacina: </strong><br><textArea style='font-weight: 600; color: black' class='textArea' placeholder='$descVac' disabled>" . "</textArea></p>";
                echo "</div>";
                echo"<div class='right'>";
                echo "<p class='pBlocks'><strong>Peso: </strong><br><input style='font-weight: 600; color: black' class='input' placeholder=' $peso Kg' disabled>" . "</input></p>";
                echo "<p class='pBlocks'><strong>Observações: </strong><br><textArea style='font-weight: 600; color: black; height: 240px' class='textArea' placeholder='$obs' disabled>" . "</textArea></p>";
                echo"</div>";
                echo "</div>";
                echo"</div>";
            }
        }
    ?>

    <?php 
        echo "<div class='centeredCon' style='margin-bottom: 50px'>";
        echo "<a class='prevCon' href='painelCon.php?id_animal=$id'>Voltar atrás</a>";
        echo "</div>"
    ?>

    <?php include "assets/files/footer.php" ?>
</body>
</html>