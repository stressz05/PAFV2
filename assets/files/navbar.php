<div class="navBar">
        <a class="textNavBar" href="informacoesanimal.php"<?php if($_SESSION['tipoUser'] != 'dono'){echo 'hidden';}?>>Vacinas</a>
        <a class="textNavBar" href="associacoes.php">Associações</a>
        <a class="textNavBar" href="escolheranimal.php" <?php if($_SESSION['tipoUser'] != 'vet'){echo 'hidden';}?>>Escolher Animal</a>
        <a class="textNavBar" href="animais.php"<?php if($_SESSION['tipoUser'] != 'vet'){echo 'hidden';}?>>Animais</a>
        <a class="textNavBar" href="#" id="logout">Log out</a>
</div>

<script>
        document.getElementById('logout').addEventListener('click', function() {
                window.location.href = 'assets/files/logout.php';
        });
</script>