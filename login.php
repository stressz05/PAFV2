<head>
    <title>BV | Login</title>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexao.php";

    $username = $conn->real_escape_string($_POST['username']);
    $nif = $conn->real_escape_string($_POST['nif']);
    $password = $conn->real_escape_string($_POST['password']);
    $password2 = $password . '1357';

    $sqlPass = "SELECT Password_Dono FROM dono WHERE NIF_Dono = '$nif'";
    $sql_query = $conn->query($sqlPass) or die("Alguma coisa correu mal..." . "<br>" . $conn->error);
    $numPasswords = $sql_query->num_rows;

    if ($numPasswords == 1) {
        $row = $sql_query->fetch_assoc();
        $passwordhash = $row['Password_Dono'];
        $passwordFinal = password_verify($password2, $passwordhash);
        echo $password2 . "<br>";
        echo password_hash($password2, PASSWORD_BCRYPT) . "<br>";
        echo $passwordhash . "<br>";
    } else {
        $sqlPass = "SELECT Password_Vet FROM veterinario WHERE NIF_Vet = '$nif'";
        $sql_query = $conn->query($sqlPass) or die("Alguma coisa correu mal..." . "<br>" . $conn->error);
        $numPasswords = $sql_query->num_rows;
        if($numPasswords == 1){
            $row = $sql_query->fetch_assoc();
            $passwordhash = $row['Password_Vet'];
            $passwordFinal = password_verify($password2, $passwordhash);
        }
    }

    if ($passwordFinal == TRUE) {

        //? Seleciona todos os valores onde existe o nif
        $sql = "SELECT * FROM dono WHERE Nome_Dono = '$username' AND NIF_Dono = '$nif'";

        //? Consulta a base de dados e armazena o seu resultado, caso corra mal exibe um aviso.
        $sql_query = $conn->query($sql) or die("Alguma coisa correu mal..." . "<br>" . $conn->error);

        //? Vê quantas linhas da DB a query devolveu
        $numUsers = $sql_query->num_rows;

        //? Testa a variavel "numUsers" e vê se o resultado é 1
        if ($numUsers == 1) {
            $row = $sql_query->fetch_assoc();
            $nif = $row['NIF_Dono'];
            $user = $row['Nome_Dono'];
            session_start();
            header("Location: informacoesanimal.html");
        } else {
            //? Seleciona todos os valores onde existe o nif e a password
            $sql = "SELECT * FROM veterinario WHERE Nome_Vet = '$username' AND NIF_Vet = '$nif'";

            //? Consulta a base de dados e armazena o seu resultado, caso corra mal exibe um aviso.
            $sql_query = $conn->query($sql) or die("Alguma coisa correu mal..." . "<br>" . $conn->error);
            $numUsers = $sql_query->num_rows;

            if ($numUsers == 1) {
                $row = $sql_query->fetch_assoc();
                $nif = $row['NIF_Vet'];
                $user = $row['Nome_Vet'];
                session_start();
                header("Location: informacoesanimal.html");
            } else {
                echo "Falha ao fazer login! Causa:" . "<br>Nif ou Password Incorretos!" . "<br>Nenhum Utilizador existe!";
            }
        }
    } else {
        echo "Password incorreta!" . "<br>Por favor verifique!";
    }
}
?>