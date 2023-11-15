<head>
    <title>BV / Consulta</title>
</head>

<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require "conexao.php";

    $idConsulta = $_SESSION['idConsulta'];
    $idAnimal = $_SESSION['idAnimal'];

    $nomeVac = $_POST['nomeVac'];
    $dataVac = $_POST['dataVac']; 
    $descVac = $_POST['descVac'];
    $peso = $_POST['peso'];
    $obs = $_POST['obs'];
    $aux = explode("-", $dataVac);
    $dataVacRev = $aux[2] . "-" . $aux[1] . "-" . $aux[0];

    $sql = "INSERT INTO consulta (ID_Animal, ID_Consulta, Nome_Vacina, Descricao_Vacina, Peso, Data, Observacoes) VALUES ('$idAnimal', '$idConsulta', '$nomeVac', '$descVac', '$peso', '$dataVacRev', '$obs')";
    if($conn->query($sql) === TRUE){
        $sqlUpdate = "UPDATE animal SET Peso = '$peso' WHERE ID_Animal = '$idAnimal'";
        if($conn->query($sqlUpdate) === TRUE){
            $_SESSION['msg'] = true;
            header("Location: /animais.php");
        }
    } else {
        echo 'Ups! Erro...' . "<br>" . $conn->error;
    }

    $conn->close();
}
?>