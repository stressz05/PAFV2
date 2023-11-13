<?php
require "assets/files/verificacao.php";
$active = "pag1";
if ($_SESSION['tipoUser'] == 'vet') {
     header("Location: /escolheranimal.php");
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <title>BV / Informações</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body class="body">
    <!-- Cria a barra de navegação do Site-->
    <?php 
        include "assets/files/navbar.php"; 
        if(!isset($_SESSION['msg'])){
            $_SESSION['msg'] = false;
        }
        if($_SESSION['msg'] == true){
            echo "<script>alert('Alterações guardadas com sucesso!')</script>";
            $_SESSION['msg'] = false;
        }
    ?>

    <div class="boasVindas">
        <p><strong>Olá</strong> <?php print($_SESSION['nome_dono']) ?>!</p>
    </div>

    <!-- Cria uma pequena área que irá conter as informações do animal-->
    <div class="infoP">
        <p>Informações básicas do animal: </p>
    </div>

    <div class="info">
        <?php
        require "assets/files/conexao.php";
        $nif = $_SESSION['nif_dono'];

        $sql = "SELECT Nome, Idade, Idade_Medida, Tamanho, Peso, ID_Animal, ID_Consulta FROM animal WHERE NIF_Dono = '$nif'";
        $query_sql = $conn->query($sql);

        if ($query_sql == true) {
            $linhas = $query_sql->fetch_assoc();

            $nome = $linhas['Nome'];
            $idade = $linhas['Idade'];
            $idadeTipo = $linhas['Idade_Medida'];
            $tamanho = $linhas['Tamanho'];
            $peso = $linhas['Peso'];
        }

        echo "<form action='assets/files/editar.php' method='post'>";
        echo "<img id='edit' class='edit' src='assets/imagens/editSquare.png' title='Editar' onclick='editar()'>";
        echo "<img id='cancel' class='edit' src='assets/imagens/cancel.png 'title='Cancelar' onclick='cancelar()' hidden>";
        echo "<p id='name'><strong>Nome:</strong> " . $nome . "</p>";
        echo "<p id='age'><strong>Idade:</strong> " . "<span id='ageV'>" . $idade . " " . $idadeTipo . "</span>" . "<input class='editarInput' type='number' name='ageInput' id='ageInput' hidden>";
        echo "<label id='labelMonth' hidden> <input type='checkbox' name='typeAge' value='month' id='month'>Meses</label>";
        echo "<label id='labelYear' hidden><input type='checkbox' name='typeAge' value='year' id='year'>Anos</label></p>";
        echo "<p id='size'><strong>Tamanho:</strong> " . $tamanho .  "</p>";
        echo "<p id='weight'><strong>Peso:</strong> " . "<span id='weightV'>" . $peso . "Kg" . "</span>" . "<input class='editarInput' type='number' name='weightInput' id='weightInput' hidden>";
        echo "<input type='submit' class='prevCon' value='Confirmar' id='confirmar' style='float: right;' hidden></input></p>";
        echo "</form>";
        ?>
    </div>

    <!-- Cria a area que vai conter as vacinas que o animal levou-->
    <div class="infoP">
        <p>Consultas: </p>
    </div>

    <div class="block" style="margin-left: 5%">
        <?php
        require "assets/files/conexao.php";

        $nif = $_SESSION['nif_dono'];
        $sqlID = "SELECT ID_Animal, ID_Consulta FROM animal WHERE NIF_Dono = '$nif'";
        $sqlID_query = $conn->query($sqlID);

        if ($sqlID_query == true) {
            $linhasID = $sqlID_query->fetch_assoc();
            $id = $linhasID['ID_Animal'];
            $idCon = $linhasID['ID_Consulta'];
        }

        $sql = "SELECT Nome_Vacina, Descricao_Vacina, Peso, Data, Observacoes FROM consulta WHERE ID_Animal = '$id' AND ID_Consulta = '$idCon'";
        $sql_query = $conn->query($sql);

        if ($sql_query == true) {
            while ($linhas = $sql_query->fetch_assoc()) {
                $nomeVac = $linhas['Nome_Vacina'];
                $descVac = $linhas['Descricao_Vacina'];
                $peso = $linhas['Peso'];
                $data = $linhas['Data'];
                $obs = $linhas['Observacoes'];

                echo "<div class=b-row style='height: fit-content'>";
                echo "<strong>Ação realizada: </strong>" . $nomeVac . "<br>";
                if ($descVac != '') {
                    echo "<strong>Descrição: </strong><br>" . $descVac . "<br>";
                }
                echo "<strong>Peso: </strong>" . $peso . "Kg" . "<br>";
                echo "<strong>Data: </strong>" . $data . "<br>";
                echo "<strong>Observações: </strong><br>" . $obs;
                echo "</div>";
            }
        }
        ?>
    </div>
    <?php include "assets/files/footer.php"; ?>
    <script src="assets/JS/info.js"></script>
</body>
</html>