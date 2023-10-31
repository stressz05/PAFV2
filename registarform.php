<!DOCTYPE html>
<html lang="pt-pt">

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

    <!--* centra e cria o formulário de registo-->
    <div class="centered">
        <div class="form">
            <form class="form-center" action="assets/files/registar.php" method="post">
                <div>
                    <p class="pForm">Registo:</p>
                    <div>
                        <input class="input" type="text" id="username" name="username" placeholder="Nome de Utilizador"
                            required>
                        <br>
                    </div>
                    <div>
                        <input class="input" type="text" pattern="[0-9]{9}" id="nif" name="nif" placeholder="NIF" required>
                        <br>
                    </div>
                    <div>
                        <input class="input" type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input class="input" type="password" id="cPassword" name="cPassword" placeholder="Confirmar Password"
                        required>
                    </div>
                    <div class="checkboxText">
                        <label id="MostrarPwd"><input type="checkbox" id="checkboxPwd">Mostrar password</label>
                    </div>
                    <div class="labelRegisto">
                        <p class="pRegisto">Sou:</p>
                        <input name="tipoUser" type="radio" id="dono" value="dono">
                        <label for="dono">Dono</label><br>
                        <input name="tipoUser" type="radio" id="vet" value="veterinario">
                        <label for="vet">Veterinário</label>
                    </div>
                    <button class="button" type="submit">Registar</button>
                </div>
            </form>
            <div class="label">
                <p>Já tem conta? <a href="/">Login</a></p>
            </div>
        </div>
    </div>
    
    <script src="assets/JS/togglePwd.js"></script>
    <?php include "assets/files/footer.php";?>
</body>
</html>