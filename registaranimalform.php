<!--* Página que vai aparecer caso o utilizador seja um Dono-->
<!DOCTYPE html>
<html lang="pt">

<head>
    <title>BV / Registo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body class="body">
    <div>
        <img class="logo" src="assets\imagens\logo2.png" alt="Logo do site" title="Logo">
        <p class="p">Bem vindo(a) ao Boletim de Vacinas para animais de estimação Online!</p>
    </div>

    <div class="centered">
        <div class="form">
            <form class="form-center" action="assets/files/registaranimal.php" method="post">
                <div>
                    <p class="pForm">Registo:</p>
                    <div>
                        <input class="input" type="text" id="nome" name="nomeAni" placeholder="Nome" required>
                        <br>
                    </div>
                    <div>
                        <input class="input" type="text" id="raca" name="raca" placeholder="Raça" required>
                        <div class="checkboxText">
                            <label><input type="checkbox" name="animal" value="cao" id="cao">Cão</label>
                            <label><input type="checkbox" name="animal" value="gato" id="gato">Gato</label>
                        </div>
                    </div>
                    <div>
                        <input class="input" type="number" id="idade" name="idade" placeholder="Idade">
                    </div>
                    <div class="checkboxText">
                        <label><input type="checkbox" name="typeAge" value="months" id="months">Meses</label>
                        <label><input type="checkbox" name="typeAge" value="years" id="years">Anos</label>
                    </div>
                    <div>
                        <input class="input" type="text" id="peso" name="peso" placeholder="Peso" required>
                    </div>
                    <div>
                        <input class="input" type="text" id="tamanho" name="tamanho" placeholder="Tamanho" required>
                    </div>
                    <div>
                        <input class="input" type="text" id="genero" name="genero" placeholder="Género" required>
                    </div>
                    <button class="button" style="margin-top: 10px;" type="submit">Registar</button>
                </div>
            </form>
            <div class="label">
                <p><a href="registarform.php">Voltar atrás</a></p>
            </div>
        </div>
    </div>
</body>

<?php include "assets/files/footer.php"; ?>

</html>