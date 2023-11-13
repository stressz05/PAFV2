<?php
require "conexao.php";
if (!isset($_SESSION)) {
    session_start();
    $nifVet = $_SESSION['nif_vet'];
}

$id = $_GET['id_animal'];

//. Verifica se o ID existe na base de dados
$sql_check = "SELECT ID_Animal, NIF_Vet FROM animal WHERE ID_Animal = '$id'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    $row = $result_check->fetch_assoc();
    $nif = $row['NIF_Vet'];
    //. O ID existe na base de dados, então o NIF do veterinário é inserido na base de dados
    $sql = "UPDATE animal SET NIF_Vet = '$nifVet' WHERE ID_Animal = '$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['msg'] = true;
        header("Location: /escolheranimal.php");
    } else {
        echo "<div style='color: red; font-size: 22px;'>Ups! Alguma coisa correu mal :(</div>" . "<br>" . $conn->error;
        echo "<a font-size: 22px;href='/escolheranimal.php'>Voltar atrás</a>";
    }
} else {
    //! O ID não existe na base de dados
    echo "<div style='color: red;'>O ID do animal não existe na base de dados.</div>";
    echo "Por favor confirme se escolheu o ID certo." . "<br>";
    echo "<a href='/escolheranimal.php'>Voltar atrás</a>";
}
?>  