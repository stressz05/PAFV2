<?php
    require "assets/files/verificacao.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <title>BV / Informações</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body class="body" onload="boasVindas()">
    <!--* Cria a barra de navegação do Site-->
    <?php include "assets/files/navbar.php"; ?>
   
    <div class="boasVindas">
        <p><strong>Olá</strong> <?php ($_SESSION['tipoUser'] === 'dono') ? print($_SESSION['nome_dono']) : print($_SESSION['nome_vet']);?>!</p>
    </div>

    <!--! Cria uma pequena área que irá conter as informações do animal-->
    <!--! Ainda vai levar alterações quando se ligar à base de dados-->

    <div class="infoP">
        <p>Informações básicas do animal: </p>
    </div>
    <div class="info">
        <?php 
            require "assets/files/conexao.php";
            $nif = $_SESSION['nif_dono'];
            
            $sql = "SELECT Nome, Idade, Idade_Medida, Tamanho, Peso, ID_Animal, ID_Consulta FROM animal WHERE NIF_Dono = '$nif'";
            $query_sql = $conn->query($sql);

            if($query_sql == true){
                $linhas = $query_sql->fetch_assoc();
                
                $nome = $linhas['Nome'];
                $idade = $linhas['Idade'];
                $idadeTipo = $linhas['Idade_Medida'];
                $tamanho = $linhas['Tamanho'];
                $peso = $linhas['Peso'];
            }

            echo "<img id='edit' class='edit' src='assets/imagens/editSquare.png' title='Editar' onclick='editar()'>";
            echo "<img id='cancel' class='edit' src='assets/imagens/cancel.png 'title='Cancelar' onclick='cancelar()' hidden>";
            echo "<p id='name'><strong>Nome:</strong> " . $nome . "</p>";
            echo "<p id='age'><strong>Idade:</strong> " . "<span id='ageV'>" . $idade . " " . $idadeTipo . "</span>". "<input class='editarInput' type='text' pattern='[0-9]+' name='ageInput' id='ageInput' hidden>";
            echo "<label id='labelMonth' hidden>|<input type='checkbox' name='typeAge' value='month' id='month'>Meses</label>";
            echo "<label id='labelYear' hidden><input type='checkbox' name='typeAge' value='year' id='year'>Anos</label>";
            echo "</p>";
            echo "<p id='size'><strong>Tamanho:</strong> " . $tamanho .  "</p>";
            echo "<p id='weight'><strong>Peso:</strong> " . "<span id='weightV'>" . $peso . "Kg" . "</span>". "<input class='editarInput' type='text' name='weightInput' id='weightInput' hidden>";
            echo "<a class='confirm' id='confirmar' style='float: right;' hidden href=''>Confirmar</a>";
            echo "</p>";
        ?>


    </div>

    <div class="infoP">
        <p>Vacinas do Animal:</p>
    </div>


</body>

<?php include "assets/files/footer.php";?>

<script>
    //. Função para se puder editar.
    function editar() {
        let age = document.getElementById('ageInput');
        let weight = document.getElementById('weightInput');
        let confirmar = document.getElementById('confirmar');
        var image = document.getElementById('edit');
        let month = document.getElementById('labelMonth');
        let year = document.getElementById('labelYear');
        let ageV = document.getElementById('ageV');
        let weightV = document.getElementById('weightV');
        let cancel = document.getElementById('cancel');

        image.hidden = true;
        cancel.hidden = false;
        month.style.fontSize = "20px";
        year.style.fontSize = "20px";
        age.hidden = false;
        weight.hidden = false;
        confirmar.hidden = false;
        month.hidden = false;
        year.hidden = false;
        ageV.hidden = true;
        weightV.hidden = true;
    }

    //. Função para cancelar a Edição
    function cancelar(){
        let age = document.getElementById('ageInput');
        let weight = document.getElementById('weightInput');
        let confirmar = document.getElementById('confirmar');
        var image = document.getElementById('edit');
        let month = document.getElementById('labelMonth');
        let year = document.getElementById('labelYear');
        let ageV = document.getElementById('ageV');
        let weightV = document.getElementById('weightV');
        let cancel = document.getElementById('cancel');

        image.hidden = false;
        cancel.hidden = true;
        month.style.fontSize = "20px";
        year.style.fontSize = "20px";
        age.hidden = true;
        weight.hidden = true;
        confirmar.hidden = true;
        month.hidden = true;
        year.hidden = true;
        ageV.hidden = false;
        weightV.hidden = false;
    }
</script>

</html>