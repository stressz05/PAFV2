<head>
    <title>BV | Login</title>
</head>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "conexao.php";
        $userType = $_POST['tipoUser'];

        if($userType === "dono"){
            $dono_username = $_POST['username'];
            $password = $_POST['password'];
            $cPassword = $_POST['cPassword'];
            $dono_nif = $_POST['nif'];

            if($password === $cPassword){
                $d_password = $_POST['password'];
                $d_password2 = $d_password . '1357';
                $d_passwordCompleta = password_hash($d_password2, PASSWORD_BCRYPT);
            } else {
                echo '<script>alert("As passwords não correspondem!")</script>';
                echo "Erro no registo.";
                exit;
            }
        
            $sql = "INSERT INTO dono (Nome_Dono, Password_Dono, NIF_Dono) VALUES ('$dono_username','$d_passwordCompleta','$dono_nif')";
        
            if ($conn->query($sql) === TRUE) {
                header('Location: /registaranimalform.php');
                exit;
            } else {
                echo "Erro." . $sql . "<br>" . $conn->error;
            }
        } elseif($userType === "veterinario"){
            $vet_username = $_POST['username'];
            $vet_password = $_POST['password'];
            $vet_nif = $_POST['nif'];

            if($password === $cPassword){
                $v_password = $_POST['password'];
                $v_password2 = $v_password . '1357';
                $v_passwordCompleta = password_hash($v_password2, PASSWORD_BCRYPT);
            } else {
                echo '<script>alert("As passwords não correspondem!")</script>';
                echo "Erro no registo.";
                exit;
            }
    
            $sql = "INSERT INTO veterinario (Nome_Vet, Password_Vet, NIF_Vet) 
                        VALUES ('$vet_username','$v_passwordCompleta','$vet_nif')";
    
            if($conn->query($sql) === TRUE){
                header('Location: /index.html');
                exit;
            } else {
                echo "Erro." . $sql . "<br>" . $conn->error;
            }
        }

        header('Location: registaranimal.php?donoNif = &dono_nif');
        header('Location: registaranimal.php?vetNif = $vet_nif');

        $conn->close();
    } else {
        echo("Acesso não autorizado.");
    }
