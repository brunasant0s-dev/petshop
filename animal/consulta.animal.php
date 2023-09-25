<?php
include("db_connection.php");

$query = "SELECT NOME, RACA, DONO FROM animais";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Exibir a lista de animais
echo "<h1>Lista de Animais</h1>";
echo "<table>";
echo "<tr><th>NOME</th><th>RAÇA</th><th>DONO</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>{$row['NOME']}</td><td>{$row['RACA']}</td><td>{$row['DONO']}</td></tr>";
}

echo "</table>";

mysqli_close($conexao);
?>
