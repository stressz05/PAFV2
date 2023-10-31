<div class="navBar">
        <a class="textNavBar <?php if($active == "pag1"){echo 'active';}?>" href="informacoesanimal.php"<?php if($_SESSION['tipoUser'] != 'dono'){echo 'hidden';}?>>Vacinas</a>
        <a class="textNavBar <?php if($active == "pag2"){echo 'active';}?>" href="associacoes.php">Associações</a>
        <a class="textNavBar <?php if($active == "pag3"){echo 'active';}?>" href="escolheranimal.php" <?php if($_SESSION['tipoUser'] != 'vet'){echo 'hidden';}?>>Escolher Animal</a>
        <a class="textNavBar <?php if($active == "pag4"){echo 'active';}?>" href="animais.php"<?php if($_SESSION['tipoUser'] != 'vet'){echo 'hidden';}?>>Animais</a>
        <a class="textNavBar" href="#" id="logout">Logout</a>
</div>

<script>
        document.getElementById('logout').addEventListener('click', function() {
                window.location.href = 'assets/files/logout.php';
        });
</script>