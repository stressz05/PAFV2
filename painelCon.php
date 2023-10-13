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

    if($sql_query !== false){
        $rows = $sql_query->fetch_assoc();
        $nome = $rows['Nome'];
        $peso = $rows['Peso'];
        $idCon = $rows['ID_Consulta'];
    }
    ?>

    <div class="centered" style="margin-top: 0">
        <div class="containerPainel">
            <div class="left">
                <p class="pBlocks">Nome: <?php echo $nome; ?></p>
                <div class="pBlocks">
                    <label>Nome da Vacina: <br><input type="text" class="input"></label>
                </div>
                <div class="pBlocks">
                    <label>Data de administração: <br><input type="date" class="input"></label>
                </div>
                <div class="pBlocks">
                    <label>Descrição da vacina: <span style="font-size: 15px">(opcional)</span><br><textarea class="textArea"></textarea></label>
                </div>
            </div>
            
            <div class="right">
                <div class="pBlocks">
                    <label>Peso: <br> <input type="text" class="input" placeholder=" Peso anterior: <?php echo $peso; ?>Kg"></label>
                </div>
                <div class="pBlocks">
                    <label>Observações:<br><textarea class="textArea" style="height: 240px"></textarea></label>
                </div>
            </div>
        </div>
    </div>

    <div class="centered" style="margin-top: 20px">
        <form action="animais.php" method="post" class="formEscolher">
            <input type="submit" value="Confirmar" class="btnEscolherAnimal">
        </form>
    </div>

    <?php include "assets/files/footer.php" ?>
</body>

</html>