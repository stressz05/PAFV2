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
    <link rel="stylesheet" href="/stylesheet.css">
    <title>BV / Animais</title>
</head>

<body class="body">
    <?php include "assets/files/navbar.php" ?>
    <div class="centered">
        <p class="p">Nesta página irão aparecer os animais pelos quais você é responsável</p>
    </div>
    <div class="centered">
        <div class="blocksAnimais">
            <?php
            require "assets/files/conexao.php";
            $nifVet = $_SESSION['nif_vet'];

            $sql = "SELECT * FROM animal WHERE NIF_Vet = '$nifVet'";
            $sql_query = $conn->query($sql);

            if ($sql_query == true) {
                //. Este while verifica se há linhas para ler do resultado da consulta
                //. O loop vai continuar até não haver linhas para ler.
                while ($linhas = $sql_query->fetch_assoc()) {
                    $nome = $linhas['Nome'];
                    $raca = $linhas['Raca'];
                    $familia = $linhas['Especie'];
                    $idade = $linhas['Idade'] . " " . $linhas['Idade_Medida'];
                    $peso = $linhas['Peso'] . "Kg";
                    $tamanho = $linhas['Tamanho'];
                    $genero = $linhas['Genero'];

                    echo "<div class='b-row'>";
                    echo "Nome: " .  $nome . "<br>";
                    echo "Raça: " .  $raca . "<br>";
                    echo "Família: " .  $familia . "<br>";
                    echo "Idade: " .  $idade . "<br>";
                    echo "Peso: " .  $peso . "<br>";
                    echo "Tamanho: " .  $tamanho . "<br>";
                    echo "Género: " .  $genero . "<br>";
                    echo "<br>";
                    echo "<a href='painelvac.php?id_animal=" . $linhas['ID_Animal'] . " 'class='btnPainel'>Ir para o Painel</a>";
                    echo "<a href='assets/files/removerAnimal.php?id_animal=" . $linhas['ID_Animal'] . "' class='remove'>Remover Animal</a>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
    <?php include "assets/files/footer.php" ?>
</body>

</html>