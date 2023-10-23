<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['tipoUser'] != 'admin') {
    session_destroy();
    header("Location: /");
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BV / Apagar</title>
    <link rel="stylesheet" href="/stylesheet.css">
</head>

<body class="body">
    <div class="navBar">
        <a class="textNavBar" href="painelAdmin.php">Voltar atrás</a>
        <a class="textNavBar" href="#" id="logout">Logout</a>
    </div>

    <div class="centered">
        <p class="p">Donos e animais para apagar: </p>
    </div>

    <div class="centered" style="margin-top: 0;">
        <input class="input" type="text" id="searchInput" placeholder="Pesquisar por nome do dono ou animal" oninput="searchDono()">
    </div>

    <div class="centered">
        <div class="blockDelete" id="lista">
            <?php
            require "../assets/files/conexao.php";

            $sql = "SELECT * FROM dono";
            $sql_query = $conn->query($sql);

            if ($sql_query != false) {

                while ($linhas = $sql_query->fetch_assoc()) {
                    $nome = $linhas['Nome_Dono'];
                    $nif = $linhas['NIF_Dono'];

                    $sql_animal = "SELECT Nome FROM animal WHERE NIF_Dono = $nif";
                    $sql_query_Animal = $conn->query($sql_animal);
                    $linhasAnimal = $sql_query_Animal->fetch_assoc();
                    $nomeAnimal = $linhasAnimal['Nome'];

                    echo "<div class='bAprovar'>";
                    echo "<strong>Nome: </strong>" . $nome . "<br>";
                    echo "<strong>Animal: </strong>" . $nomeAnimal . "<br><br>";
                    echo "<a class='btnAdmin' href='files/deleteVet.php?nif=" . $nif . "'>" . "Apagar</a>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <script>
        document.getElementById('logout').addEventListener('click', function() {
            window.location.href = '/assets/files/logout.php';
        });

        function searchDono() {
            var i;
            var input = document.getElementById("searchInput");
            var filter = input.value.toUpperCase();
            var donoList = document.getElementById("lista");
            var donos = donoList.getElementsByClassName("bAprovar");

            for (i = 0; i < donos.length; i++) {
                var dono = donos[i];
                var txtValue = dono.textContent || dono.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    dono.style.display = "";
                } else {
                    dono.style.display = "none";
                }
            }
        }
    </script>

    <?php include "../assets/files/footer.php"; ?>
</body>

</html>