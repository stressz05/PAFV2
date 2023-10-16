<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "conexao.php";
        
        if(!isset($_SESSION)){
            session_start();
        }

        $nif = $_SESSION['nif_dono'];
        $age = $_POST['ageInput'];
        $ageType = $_POST['typeAge'];
        $peso = $_POST['weightInput'];
    
        if($ageType == 'month'){
            $sql = "UPDATE animal SET Idade = '$age', Idade_Medida = 'Meses', Peso = '$peso' WHERE NIF_Dono = '$nif'";
            if($conn->query($sql) == true){
                header("Location: /informacoesanimal.php");
            } else {
                echo "UPS! Alguma coisa correu mal..." . "<br>" . $conn->error;
            }
        } else {
            $sql = "UPDATE animal SET Idade = '$age', Idade_Medida = 'Anos', Peso = '$peso' WHERE NIF_Dono = '$nif'";
            if($conn->query($sql) == true){
                header("Location: /informacoesanimal.php");
            } else {
                echo "UPS! Alguma coisa correu mal..." . "<br>" . $conn->error;
            }
        }
    }
?>