<?php
    session_start();

    if(!isset($_SESSION['loggedin'])){
        header("Location: index.html");
    }
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>BV | Informações</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body class="body" onload="boasVindas()">
    <!--* Cria a barra de navegação do Site-->
    <div class="navBar">
        <a class="textNavBar" href="informacoesanimal.php">Vacinas</a>
        <a class="textNavBar" href="associacoes.php">Associações</a>
        <a class="textNavBar" href="#" id="logout">Log out</a>
    </div>

    <div class="boasVindas">
        <p>Olá <?php ($_SESSION['tipoUser'] === 'dono') ? $_SESSION['nome_dono'] : $_SESSION['nome_vet'];?>!</p>
    </div>

    <!-- <div class="boasVindas">
        <p id="mensagemBoasVindas"></p>
    </div> -->

    <!--! Cria uma pequena área que irá conter as informações do animal-->
    <!--! Ainda vai levar alterações quando se ligar à base de dados-->

    <div class="infoP">
        <p>Informações básicas do animal: </p>
    </div>
    <div class="info">
        <img id="edit" class="edit" src="assets/imagens/editSquare.png" title="Editar" onclick="editar()">
        <p id="name">Nome: </p>
        <p id="age">Idade: <input class="editarInput" type="number" name="ageInput" id="ageInput" hidden>
            <label id="labelMonth" hidden>|<input type="checkbox" name="typeAge" value="month" id="month">Meses</label>
            <label id="labelYear" hidden><input type="checkbox" name="typeAge" value="year" id="year" >Anos</label>
        </p>
        <p id="size">Tamanho: </p>
        <p id="weight">Peso:
            <input class="editarInput" type="text" name="weightInput" id="weightInput" hidden>
            <a class="confirm" id="confirmar" style="float: right;" hidden href="">Confirmar</a>
        </p>

    </div>

    <div class="infoP">
        <p >Vacinas do Animal:</p>
    </div>

    <div class="centered">
        <div class="block">
            <!--! Gatos-->
            <div class="t-row">
                <p class="pBlocks">Vacina contra a raiva</p>
                <p class="numAssociacao">Gato e Cão</p> <!--! Serve para identificação, irá ser removido no futuro-->
                <p class="checkboxVac"><input type="checkbox" name="yes" id="first">Aplicada</p>
            </div>

            <div class="t-row">
                <p class="pBlocks">Vacina tríplice</p>
                <ul class="pBlocks">
                    <li>Panleucopenia</li>
                    <li>Calicivirose</li>
                    <li>Rinotraqueíte</li>
                </ul>
                <p class="numAssociacao">Gato</p> <!--! Serve para identificação, irá ser removido no futuro-->
                <p class="checkboxVac"><input type="checkbox" name="yes" id="second">Aplicada</p>
            </div>    

            <div class="t-row">
                <p class="pBlocks">Vacina contra a leucemia felina</p>
                <p class="numAssociacao">Gato</p> <!--! Serve para identificação, irá ser removido no futuro-->
                <p class="checkboxVac"><input type="checkbox" name="yes" id="third">Aplicada</p>
            </div>     

            <div class="t-row">
                <p class="pBlocks">Vacina contra a clamidiose felina</p>
                <p class="numAssociacao">Gato</p> <!--! Serve para identificação, irá ser removido no futuro-->
                <p class="checkboxVac"><input type="checkbox" name="yes" id="forth">Aplicada</p>
            </div>
            <!--! Cães-->
            <div class="t-row">
                <p>Vacina múltipla</p>
                <ul class="pBlocks">
                    <li>Parvovirose</li>
                    <li>Cinomose</li>
                    <li>Hepatite infecciosa canina</li>
                    <li>Leptospirose</li>
                </ul>
                <p class="numAssociacao">Cão</p> <!--! Serve para identificação, irá ser removido no futuro-->
                <p class="checkboxVac"><input type="checkbox" name="yes" id="fifth">Aplicada</p>
            </div>

            <div class="t-row">
                <p class="pBlocks">Vacina contra a tosse dos canis</p>
                <p class="pBlocks">(Traqueobronquite infecciosa canina)</p>                
                <p class="numAssociacao">Cão</p> <!--! Serve para identificação, irá ser removido no futuro-->
                <p class="checkboxVac"><input type="checkbox" name="yes" id="sixth">Aplicada</p>
            </div> 

            <div class="t-row">
                <p class="pBlocks">Vacina contra a doença de Lyme</p>
                <p class="pBlocks">(Borreliose)</p>
                <p class="numAssociacao">Cão</p> <!--! Serve para identificação, irá ser removido no futuro-->
                <p class="checkboxVac"><input type="checkbox" name="yes" id="seventh">Aplicada</p>
            </div>
        </div>
    </div>
</body>

<footer class="footer">
    Boletim de vacinas &copy; Afonso Almeida 2023
</footer>


<script>
    function editar() {
        var age = document.getElementById('ageInput');
        var weight = document.getElementById('weightInput');
        var confirmar = document.getElementById('confirmar');
        var image = document.getElementById('edit');
        var month = document.getElementById('labelMonth');
        var year = document.getElementById('labelYear');

        image.style.border = "2px solid black";
        image.style.padding = "2px"
        age.hidden = false;
        weight.hidden = false;
        confirmar.hidden = false;
        month.hidden = false;
        year.hidden = false;
    }

    function boasVindas() {
        const username = localStorage.getItem("nome");
        const boasVindas = document.getElementById("mensagemBoasVindas");
        boasVindas.textContent = "Olá " + username + "!";
    }

    if (localStorage.getItem('utilizador_on') !== 'true') {
        window.location.href = 'index.html';
    }

    document.getElementById('logout').addEventListener('click', function () {
        localStorage.removeItem('utilizador_on');
        window.location.href = 'logout.php';
    });

</script>

</html>