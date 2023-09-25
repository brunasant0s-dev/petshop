<?php
include("db_connection.php");

$query = "SELECT Nome, Endereco FROM clientes";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Exibir a lista de clientes
echo "<h1>Lista de Clientes</h1>";
echo "<table>";
echo "<tr><th>Nome</th><th>Endereço</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>{$row['Nome']}</td><td>{$row['Endereco']}</td></tr>";
}

echo "</table>";

mysqli_close($conexao);
?>
