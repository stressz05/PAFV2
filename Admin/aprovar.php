<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['tipoUser'] != 'admin'){
        session_destroy();
        header("Location: /");
    }
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BV / Aprovar</title>
    <link rel="stylesheet" href="/stylesheet.css">
</head>

<body class="body">
    <div class="navBar">
        <a class="textNavBar" href="painelAdmin.php">Voltar atrás</a>
        <a class="textNavBar" href="#" id="logout">Logout</a>
    </div>

    <div class="centered">
        <p class="p">Veterinários por aprovar: </p>
    </div>

    <div class="centered">
        <div class="blockAprovar">
            <?php 
                require "../assets/files/conexao.php"; 

                $sql = "SELECT * FROM veterinario WHERE status = 'pendente'";
                $sql_query = $conn->query($sql);

                if($sql_query != false){
                
                    while($linhas = $sql_query->fetch_assoc()){
                        $nome = $linhas['Nome_Vet'];
                        $nif = $linhas['NIF_Vet'];
                        $data = $linhas['Data_Pedido'];
                        echo "<div class='bAprovar'>";
                        echo "<strong>Nome: </strong>" . $nome . "<br>";
                        echo "<strong>Data do Pedido: </strong>" . $data . "<br><br>";
                        echo "<a class='btnAdmin' href='files/aceitar.php?nif=" . $nif . "'>" . "Aprovar</a>";
                        echo "<a class='remove' style='margin-right: 20px;' href='files/recusar.php?nif=" . $nif . "'>" . "Recusar</a>";
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
    </script>

    <?php include "../assets/files/footer.php"; ?>
</body>
</html>