<head>
    <title>BV | Login</title>
</head>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "conexao.php";

        $ageType = $_POST['typeAge'];
        $animal = $_POST['animal'];
        
        $nome = $_POST['nomeAni'];
        $raca = $_POST['raca'];
        $idade = $_POST['idade'];
        $peso = $_POST['peso'];
        $tamanho = $_POST['tamanho'];
        $genero = $_POST['genero'];

        if($ageType == 'months'){
            if($animal == 'cao'){
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Meses', 'Cão')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Meses', 'Gato')";
            }
        } else if($ageType == 'years') {
            if($animal == 'cao'){
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Anos', 'Cão')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Anos', 'Gato')";
            }
        } else {
            echo "Ups! Alguma coisa correu mal... :/";
        }
            
        if($conn->query($sql) === TRUE){
            header('Location: /index.html');
            exit;
        } else {
            echo "Erro." . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo("Acesso não autorizado.");
    }
