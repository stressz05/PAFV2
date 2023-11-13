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

    if(empty($peso)){
        $sqlPeso = "SELECT Peso FROM animal WHERE NIF_Dono = $nif";
        $sqlQuery = $conn->query($sqlPeso);
        if($sqlQuery == true){
            $result = $sqlQuery->fetch_assoc();
            $peso = $result['Peso'];
        }
    } else if(empty($age) && empty($_POST['typeAge'])){
        $sqlAge = "SELECT Idade, Idade_Medida FROM animal WHERE NIF_Dono = $nif";
        $sqlQuery = $conn->query($sqlAge);
        if($sqlQuery == true){
            $result = $sqlQuery->fetch_assoc();
            $age = $result['Idade'];
            $ageType = $result['Idade_Medida'];
        }
    }

    if($ageType == 'month'){
        $sql = "UPDATE animal SET Idade = '$age', Idade_Medida = 'Meses', Peso = '$peso' WHERE NIF_Dono = '$nif'";
        if($conn->query($sql) == true){
            $_SESSION['msg'] = true;
            header("Location: /informacoesanimal.php");
        } else {
            echo "UPS! Alguma coisa correu mal..." . "<br>" . $conn->error;
        }
    } else {
        if($age > 1){
            $sql = "UPDATE animal SET Idade = '$age', Idade_Medida = 'Anos', Peso = '$peso' WHERE NIF_Dono = '$nif'";
            if($conn->query($sql) == true){
                $_SESSION['msg'] = true;
                header("Location: /informacoesanimal.php");
            } else {
                echo "UPS! Alguma coisa correu mal..." . "<br>" . $conn->error;
            }
        } else if($age == 1){
            $sql = "UPDATE animal SET Idade = '$age', Idade_Medida = 'Ano', Peso = '$peso' WHERE NIF_Dono = '$nif'";
            if($conn->query($sql) == true){
                $_SESSION['msg'] = true;
                header("Location: /informacoesanimal.php");
            } else {
                echo "UPS! Alguma coisa correu mal..." . "<br>" . $conn->error;
            }
        }
    }
}