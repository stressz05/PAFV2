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
    <title>BV / Escolher</title>
</head>

<body class="body">
    <?php include "assets/files/navbar.php" ?>
    <div class="centered">
        <p class="p"><span style="color:crimson">AVISO!</span> Só aparecem animais sem veterinário associado</p>
    </div>

    <div class="centered" style="margin-top: 0">
        <form action="assets/files/escolhaAnimal.php" method="post" class="formEscolher">
            <p class="label">Escolha o ID de um animal: </p>
            <input type="number" class="input" name="ID_animal" id="idanimal" placeholder="ex. 1" required>
            <input type="submit" value="Escolher" class="btnEscolherAnimal">
        </form>
    </div>

    <div class="centered">
        <table class="table">
            <tr>
                <th class="tableHeader">ID</th>
                <th class="tableHeader">Nome</th>
                <th class="tableHeader">Raça</th>
                <th class="tableHeader">Espécie</th>
                <th class="tableHeader">Idade</th>
                <th class="tableHeader">Peso</th>
                <th class="tableHeader">Tamanho</th>
                <th class="tableHeader">Género</th>
                <th class="tableHeader">Nome Dono</th>
            </tr>
            <?php
            require "assets/files/conexao.php";

            $sql = "SELECT * FROM animal";
            $sql_query = $conn->query($sql);

            if ($sql_query !== false) {
                while ($linhas = $sql_query->fetch_assoc()) {
                    $nif_dono = $linhas['NIF_Dono'];
                    $nif_vet = $linhas['NIF_Vet'];
                    $sql = "SELECT Nome_Dono FROM dono WHERE NIF_Dono = $nif_dono";
                    $sql_query_dono = $conn->query($sql);
                                    
                    if ($sql_query_dono !== false) {
                        $linhas_dono = $sql_query_dono->fetch_assoc();
                        $nome_dono = $linhas_dono['Nome_Dono'];
                    }

                    //. Verifica se a coluna onde está o NIF do dono está vazia, se não estiver 
                    //. pula a iteração do loop e não imprime a linha do animal.
                
                    if(!empty($nif_vet)){
                        continue;
                    }

                    echo "<tr>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['ID_Animal'] . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['Nome'] . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['Raca'] . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['Especie'] . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['Idade'] . " " . $linhas['Idade_Medida'] . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['Peso'] . "Kg" . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['Tamanho'] . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $linhas['Genero'] . "</td>";
                    echo "<td class='tableRows' style='text-align: center'>" . $nome_dono . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

    <?php include "assets/files/footer.php" ?>
</body>

</html>