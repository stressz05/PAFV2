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
    <form action="assets/files/consulta.php" method="post" id='consulta'>
        <div class="centeredCon">
            <div class="containerPainel">
                <div class="left">
                    <p class="pBlocks"><strong>Nome: </strong><?php echo $nome; ?></p>
                    <div class="pBlocks">
                        <label>
                            <strong>Ação realizada: </strong>
                            <br>
                            <input class="input" name="nomeVac" id="action" type="text" required>
                        </label>
                    </div>      
                    <div class="pBlocks">
                        <label>
                            <strong>Data: </strong>
                            <br>
                            <input class="input" name="dataVac" id="date" type="date" required>
                        </label>
                    </div>
                    <div class="pBlocks">
                        <label>
                            <strong>Descrição da vacina: </strong>
                            <span style="font-size: 15px; color: green">(opcional)</span>
                            <br>
                            <textarea class="textArea" name="descVac" spellcheck="true"></textarea>
                        </label>
                    </div>
                </div>    

                <div class="right">
                    <div class="pBlocks">
                        <label>
                            <strong>Peso: </strong>
                            <br>
                            <input class="input" type="text" name="peso" id="weight" placeholder=" Peso anterior: <?php echo $peso; ?>Kg" required>
                        </label>
                    </div>
                    <div class="pBlocks">
                        <label>
                            <strong>Observações: </strong>
                            <br>
                            <textarea class="textArea" name="obs" id="obs" style="height: 240px" spellcheck="true" required></textarea>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="centeredCon">
            <a class="prevCon" id="canc" style="margin-right: 5px;" href='animais.php'>Cancelar</a> 
            <a class="prevCon" id="con" onclick="submitConsulta()">Confirmar</a>
        </div>
        <div class="centeredCon" style="margin-top: 5px;">
            <?php echo "<a class='prevCon' href='consultasAnteriores.php?id=$id'>Consultas anteriores</a>"; ?>
        </div>
    </form>
    <?php include "assets/files/footer.php" ?>
</body>

<script>
    function submitConsulta(){
        let action = document.getElementById('action').value
        let date = document.getElementById('date').value
        let weight = document.getElementById('weight').value
        let obs = document.getElementById('obs').value

        if(action.length !== 0 && date.length !== 0 && weight.length !== 0 && obs.length !== 0){
            document.getElementById('consulta').submit()
        } else {
            alert("Por favor preencha os campos.")
        }
        
    }
</script>
</html>