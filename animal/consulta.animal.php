<?php
include("db_connection.php");

$query = "SELECT animal_nome, animal_raca, fk_cliente_cpf FROM animais";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Exibir a lista de animais
echo "<h1>Lista de Animais</h1>";
echo "<table>";
echo "<tr><th>NOME</th><th>RAÇA</th><th>DONO</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>{$row['animal_nome']}</td><td>{$row['animal_raca']}</td><td>{$row['fk_cliente_cpf']}</td></tr>";
}

echo "</table>";

mysqli_close($conexao);
?>
