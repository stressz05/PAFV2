<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "conexao.php";
        
        if(!isset($_SESSION)){
            session_start();
        }

        $nif = $_SESSION['nif_dono'];
        $age;
        $ageType;
        $peso;

        if(!isset($age) && !isset($ageType)){
            $sqlAge = "SELECT Idade, Idade_Medida FROM animal WHERE NIF_Dono = $nif";
            $sqlAge_query = $conn->query($sqlAge);
            if($sqlAge_query == true){
                $result = $sqlAge_query->fetch_assoc();
                $age = $result['Idade'];
                $ageType = $result['Idade_Medida'];
            }
        } else {
            $age = $_POST['ageInput'];
            $ageType = $_POST['typeAge'];
        }

        if(!isset($peso)){
            $sqlPeso = "SELECT Peso FROM animal WHERE NIF_Dono = $nif";
            $sqlPeso_query = $conn->query($sqlPeso);
            if($sqlPeso_query == true){
                $result = $sqlPeso_query->fetch_assoc();
                $peso = $result['Peso'];
            }
        } else {
            $peso = $_POST['weightInput'];
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
