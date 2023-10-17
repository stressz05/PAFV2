<head>
    <title>BV / Registo</title>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexao.php";
    if (!isset($_SESSION)) {
        session_start();
    }

    //. Uso a função "MAX" para selecionar o valor máximo da coluna, e de seguida adiciono um para o valor ID_Consulta ser automático e único
    $result = $conn->query("SELECT MAX(ID_Consulta) AS total FROM animal");
    $row = $result->fetch_assoc();
    $idVac = $row['total'] + 1;

    $ageType = $_POST['typeAge'];
    $animal = $_POST['animal'];

    $nome = $_POST['nomeAni'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $peso = $_POST['peso'];
    $tamanho = $_POST['tamanho'];
    $genero = $_POST['genero'];

    $nif = $_SESSION['NIF'];

    if ($ageType == 'months') {
        if ($idade > 1) {
            if ($animal == 'cao') {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                VALUES ('$nome', '$raca', '$idade', 'Meses','$peso', '$tamanho', '$genero', 'Cão', '$nif', '$idVac')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                VALUES ('$nome', '$raca', '$idade', 'Meses', '$peso', '$tamanho', '$genero', 'Gato', '$nif', '$idVac')";
            }
        } else if($idade == 1) {
            if ($animal == 'cao') {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                VALUES ('$nome', '$raca', '$idade', 'Mês','$peso', '$tamanho', '$genero', 'Cão', '$nif', '$idVac')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                VALUES ('$nome', '$raca', '$idade', 'Mês', '$peso', '$tamanho', '$genero', 'Gato', '$nif', '$idVac')";
            }
        }
    } else if ($ageType == 'years') {
        if($idade > 1){
            if ($animal == 'cao') {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                    VALUES ('$nome', '$raca', '$idade', 'Anos', '$peso', '$tamanho', '$genero', 'Cão', '$nif', '$idVac')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                    VALUES ('$nome', '$raca', '$idade', 'Anos', '$peso', '$tamanho', '$genero', 'Gato', '$nif', '$idVac')";
            }
        } else if($idade == 1){
            if ($animal == 'cao') {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                    VALUES ('$nome', '$raca', '$idade', 'Ano', '$peso', '$tamanho', '$genero', 'Cão', '$nif', '$idVac')";
            } else {
                $sql = "INSERT INTO animal (Nome, Raca, Idade, Idade_Medida, Peso, Tamanho, Genero, Especie, NIF_Dono, ID_Consulta) 
                    VALUES ('$nome', '$raca', '$idade', 'Ano', '$peso', '$tamanho', '$genero', 'Gato', '$nif', '$idVac')";
            }
        }

    } else {
        echo "Ups! Alguma coisa correu mal... :/";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: /');
        exit;
    } else {
        echo "Erro." . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo ("Acesso não autorizado.");
}
