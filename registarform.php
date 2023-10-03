<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>BV | Registo</title>
    <meta charset="UTF-8">
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
                    <button class="button" type="submit" onclick="selecao(event)">Registar</button>
                </div>
            </form>
            <div class="label">
                <p>Já tem conta? <a href="index.html">Login</a></p>
            </div>
        </div>
    </div>
    <!--* Este script serve para confirmar se as passwords coincidem ou não, támbem verifica se o utilizado é ou não é um veterinário-->
    <script>
        var toggle = document.getElementById('checkboxPwd');
        var text = document.getElementById('MostrarPwd');
        toggle.addEventListener("click", checkPwd, false);

        function checkPwd(event) {
            if (this.checked) {
                text.style.fontWeight = "bold";
                text.style.color = "black";
                password.type = "text";
                cPassword.type = "text";
            } else {
                text.style.fontWeight = "normal";
                text.style.color = "rgb(168, 168, 168)";
                password.type = "password";
                cPassword.type = "password";
            }
        }

        function selecao(event) {
            var selDono = document.getElementById('dono')
            var selVet = document.getElementById('vet');

            var username = document.getElementById('username').value;
            var nif = document.getElementById('nif').value;
            var password = document.getElementById('password').value;
            var cPassword = document.getElementById('cPassword').value;

            // if(selDono.checked && username !== '' && nif !== '' && password !== '' && cPassword !== '') {
            //     if(cPassword !== password) {
            //         alert('As passwords não coincidem!');
            //         event.preventDefault();
            //     } else {
            //         //window.location.href = "registaranimal.php";
            //     }
            // } else if(selVet.checked && username !== '' && nif !== '' && password !== '' && cPassword !== '') {
            //     if(cPassword !== password) {
            //         alert('As passwords não coincidem!');
            //         event.preventDefault();
            //     } else {
            //         //window.location.href = "index.html";
            //     }                
            // }
        }
    </script>
</body>

<footer class="footer">
    Boletim de vacinas &copy; Afonso Almeida 2023
</footer>

</html>