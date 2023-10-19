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
        <div>
        <p class="label" style="text-align: left;">Procure o nome de um animal: </p>
        <input type="text" class="input" style="margin-top: 0" name="animal" id="nome_animal" placeholder="ex. Boby" oninput="searchAnimal()" required>
        </div>
    </div>

    <div class="centered" style="margin-top: 30px;">
        <div class="table-container">
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

                    echo "<tr id='click'>";
                    echo "<td class='tableRows' style='text-align: center'>";
                    echo "<a class='aTable' href='assets/files/escolhaAnimal.php?id_animal=" . $linhas['ID_Animal'] . "'>" . $linhas['ID_Animal'] . "</a></td>";
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
    </div>
    <script>
        function searchAnimal() {
        var input = document.getElementById("nome_animal");
        var table = document.querySelector(".table");
        var rows = table.getElementsByTagName("tr");
        
        //. Percorre as linhas da tabela começando no índice 1 (linha 2)
        for (var i = 1; i < rows.length; i++) {
            var idCell = rows[i].getElementsByTagName("td")[1]; //. Obtém a célula com o ID do animal em cada iteração.
            var idText = idCell.textContent || idCell.innerText; //. Guarda o texto da célula, no caso, o ID do animal.

            //. Função indexOf = devolve o índice de um determinado valor em uma string, caso não encontre devolve -1.
            if (idText.indexOf(input.value) > -1) { //. Verifica se o valor guardado no input existe no array idText.
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

        const clique = document.getElementById('click');

        clique.addEventListener('click', event => {
            if(event.target.tagName === 'TD'){
                const idAnimal = clique.querySelector('.aTable').getAttribute('href').split('=')[1];
                window.location.href = `assets/files/escolhaAnimal.php?id_animal=${idAnimal}`;
            }
        });
    </script>

    <?php include "assets/files/footer.php" ?>
</body>

</html>