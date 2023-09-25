<?php
include("db_connection.php");

$query = "SELECT PROCEDIMENTO, DATA, NOME_DO_ANIMAL, NOME_DO_CLIENTE FROM agendamentos";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Exibir a lista de agendamentos
echo "<h1>Lista de Agendamentos</h1>";
echo "<table>";
echo "<tr><th>Procedimento</th><th>Data</th><th>Nome do Animal</th><th>Nome do Cliente</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>{$row['PROCEDIMENTO']}</td><td>{$row['DATA']}</td><td>{$row['NOME_DO_ANIMAL']}</td><td>{$row['NOME_DO_CLIENTE']}</td></tr>";
}

echo "</table>";

mysqli_close($conexao);
?>
