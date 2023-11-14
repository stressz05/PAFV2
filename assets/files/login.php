<head>
    <title>BV / Login</title>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexao.php";

    $username = $conn->real_escape_string($_POST['username']);
    $nif = $conn->real_escape_string($_POST['nif']);
    $password = $conn->real_escape_string($_POST['password']);
    $password2 = $password . '1357';

    if($username == 'Admin' && $nif == 111000222 && $password == 'admin'){
        header("Location: /Admin/painelAdmin.php");
        if(!isset($_SESSION)){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['tipoUser'] = 'admin';
        }
    }

    $sqlDono = "SELECT * FROM dono WHERE NIF_Dono = $nif";
    $sql_query = $conn->query($sqlDono);

    $sqlVet = "SELECT * FROM veterinario WHERE NIF_Vet = $nif";
    $sqlQuery = $conn->query($sqlVet);

    if($sql_query == true && $sql_query->num_rows == 1){
        $result = $sql_query->fetch_assoc();
        $name = $result['Nome_Dono'];
        $pwd = $result['Password_Dono'];
        $nifBD = $result['NIF_Dono'];
        
        $pwdTest = password_verify($password2, $pwd);

        if($pwdTest == true){
            if($username == $name){
                if(!isset($_SESSION)){ //? isset -> função do php que devolve true se uma variável estiver definida
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['tipoUser'] = 'dono';
                    $_SESSION['nif_dono'] = $nifBD;
                    $_SESSION['nome_dono'] = $name;
                }
                header("Location: /informacoesanimal.php");
                exit;
            } else {
                echo "<p style='font-size:25px'>Nome incorreto. Por favor verifique.</p>";
            }
        } else {
            echo "<p style='font-size:25px'>Password incorreta. Por favor verifique.</p>";
        }
    } else if($sqlQuery == true && $sqlQuery->num_rows == 1){
        $resultVet = $sqlQuery->fetch_assoc();
        $name = $resultVet['Nome_Vet'];
        $pwd = $resultVet['Password_Vet'];
        $nifBD = $resultVet['NIF_Vet'];
        $status = $resultVet['status'];

        if($status != "aprovado"){
            header("Location: porAprovar.php");
            exit;
        }

        $pwdTest = password_verify($password2, $pwd);

        if($pwdTest == true){
            if($username == $name){
                if(!isset($_SESSION)){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['tipoUser'] = 'vet';
                    $_SESSION['nif_vet'] = $nifBD;
                    $_SESSION['nome_vet'] = $name;
                }
                header("Location: /escolheranimal.php");
                exit;
            } else {
                echo "<p style='font-size:22px'>Nome incorreto. Por favor verifique.</p>";
            }
        } else {
            echo "<p style='font-size:22px'>Password incorreta. Por favor verifique.</p>";
        }
    } else {
        echo "<p style='font-size:22px'>NIF incorreto. Por favor verifique.</p>";
    }
}
?>