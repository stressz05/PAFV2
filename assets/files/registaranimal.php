<head>
    <title>BV | Login</title>
</head>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "conexao.php";
        if(!isset($_SESSION)){
            session_start();
        }

        $ageType = $_POST['typeAge'];
        $animal = $_POST['animal'];
        
        $nome = $_POST['nomeAni'];
        $raca = $_POST['raca'];
        $idade = $_POST['idade'];
        $peso = $_POST['peso'];
        $tamanho = $_POST['tamanho'];
        $genero = $_POST['genero'];
        
        $nif = $_SESSION['NIF'];

        if($ageType == 'months'){
            if($animal == 'cao'){
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal, NIF_Dono) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Meses', 'Cão', '$nif')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal, NIF_Dono) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Meses', 'Gato', '$nif')";
            }
        } else if($ageType == 'years') {
            if($animal == 'cao'){
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal, NIF_Dono) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Anos', 'Cão', '$nif')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Peso, Tamanho, Genero, Idade_Medida, Tipo_Animal, NIF_Dono) 
                VALUES ('$nome', '$raca', '$idade', '$peso', '$tamanho', '$genero', 'Anos', 'Gato', '$nif')";
            }
        } else {
            echo "Ups! Alguma coisa correu mal... :/";
        }
            
        if($conn->query($sql) === TRUE){
            header('Location: /');
            exit;
        } else {
            echo "Erro." . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo("Acesso não autorizado.");
    }
