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
    <title>BV / Painel</title>
</head>

<body class="body">
    <?php include "assets/files/navbar.php" ?>
    <div class="centered">
        <p class="p">Painel da Consulta</p>
    </div>

    <?php
    require "assets/files/conexao.php";

    $id = $_GET['id_animal'];
    $sql = "SELECT Nome, Peso, ID_Consulta FROM animal WHERE ID_Animal = $id";
    $sql_query = $conn->query($sql);

    if ($sql_query !== false) {
        $rows = $sql_query->fetch_assoc();
        $nome = $rows['Nome'];
        $peso = $rows['Peso'];
        $idCon = $rows['ID_Consulta'];

        $_SESSION['idAnimal'] = $id;
        $_SESSION['idConsulta'] = $idCon;
    }
    ?>
    <form action="assets/files/consulta.php" method="post">
        <div class="centered" style="margin-top: 0">
            <div class="containerPainel">
                <div class="left">
                    <p class="pBlocks"><strong>Nome: </strong><?php echo $nome; ?></p>
                    <div class="pBlocks">
                        <label>
                            <strong>Nome da Vacina: </strong>
                            <br>
                            <input class="input" name="nomeVac" type="text">
                        </label>
                    </div>      
                    <div class="pBlocks">
                        <label>
                            <strong>Data de administração: </strong>
                            <br>
                            <input class="input" name="dataVac" type="date">
                        </label>
                    </div>
                    <div class="pBlocks">
                        <label>
                            <strong>Descrição da vacina: </strong>
                            <span style="font-size: 15px; color: green">(opcional)</span>
                            <br>
                            <textarea class="textArea" name="descVac"></textarea>
                        </label>
                    </div>
                </div>    

                <div class="right">
                    <div class="pBlocks">
                        <label>
                            <strong>Peso: </strong>
                            <br>
                            <input class="input" type="text" name="peso" placeholder=" Peso anterior: <?php echo $peso; ?>Kg">
                        </label>
                    </div>
                    <div class="pBlocks">
                        <label>
                            <strong>Observações: </strong>
                            <br>
                            <textarea class="textArea" name="obs" style="height: 240px"></textarea>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="centered" style="margin-top: 10px">
            <button class="btnEscolherAnimal" type="submit">Confirmar</button>
        </div>
    </form>

    <?php include "assets/files/footer.php" ?>
</body>

</html>