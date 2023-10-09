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


    //! Procura e testa as passwords
    if ($numPasswords == 1) {
        $row = $sql_query->fetch_assoc();
        $passwordhash = $row['Password_Dono'];
        $passwordFinal = password_verify($password2, $passwordhash);
    } else {
        $sqlPass = "SELECT Password_Vet FROM veterinario WHERE NIF_Vet = '$nif'";
        $sql_query = $conn->query($sqlPass) or die("Alguma coisa correu mal..." . "<br>" . $conn->error);
        $numPasswords = $sql_query->num_rows;
        if ($numPasswords == 1) {
            $row = $sql_query->fetch_assoc();
            $passwordhash = $row['Password_Vet'];
            $passwordFinal = password_verify($password2, $passwordhash);
        }
    }

    //! Caso encontre a password efetua o login do utilizador
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

            if(!isset($_SESSION)){ //? isset -> função do php que devolve true se uma variável estiver definida
                session_start();
                $_SESSION['loggedin'] = true;
            }
            
            $_SESSION['tipoUser'] = 'dono';
            $_SESSION['nif_dono'] = $row['NIF_Dono'];
            $_SESSION['nome_dono'] = $row['Nome_Dono'];

            header("Location: /informacoesanimal.php");
        } else {
            //? Seleciona todos os valores onde existe o nif e a password
            $sql = "SELECT * FROM veterinario WHERE Nome_Vet = '$username' AND NIF_Vet = '$nif'";

            //? Consulta a base de dados e armazena o seu resultado, caso corra mal exibe um aviso.
            $sql_query = $conn->query($sql) or die("Alguma coisa correu mal..." . "<br>" . $conn->error);
            $numUsers = $sql_query->num_rows;

            if ($numUsers == 1) {
                $row = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                    $_SESSION['loggedin'] = true;
                }

                $_SESSION['tipoUser'] = 'vet';
                $_SESSION['nif_vet'] = $row['NIF_Vet'];
                $_SESSION['nome_vet'] = $row['Nome_Vet'];

                header("Location: /escolheranimal.php");
            } else {
                echo "Falha ao fazer login! Causa:" . "<br>Nif ou Password Incorretos!" . "<br>Nenhum Utilizador existe!";
            }
        }
    } else {
        echo "Password incorreta!" . "<br>Por favor verifique!";
    }
}
?>