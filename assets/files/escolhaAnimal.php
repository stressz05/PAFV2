<?php
require "conexao.php";
if (!isset($_SESSION)) {
    session_start();
    $nifVet = $_SESSION['nif_vet'];
}

$id = $_POST['ID_animal'];

//. Verifica se o ID existe na base de dados
$sql_check = "SELECT ID_Animal FROM animal WHERE ID_Animal = '$id'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    //. O ID existe na base de dados, então o NIF do veterinário é inserido na base de dados
    $sql = "UPDATE animal SET NIF_Vet = '$nifVet' WHERE ID_Animal = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='color: green;'>Animal guardado com sucesso.</div>";
        echo "<a href='/escolheranimal.php'>Voltar atrás</a>";
    } else {
        echo "<div style='color: red;'>Ups! Alguma coisa correu mal :(</div>" . "<br>" . $conn->error;
        echo "<a href='/escolheranimal.php'>Voltar atrás</a>";
    }
} else {
    //! O ID não existe na base de dados
    echo "<div style='color: red;'>O ID do animal não existe na base de dados.</div>";
    echo "Por favor confirme se escolheu o ID certo." . "<br>";
    echo "<a href='/escolheranimal.php'>Voltar atrás</a>";
}
?>