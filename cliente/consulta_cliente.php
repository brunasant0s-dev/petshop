<?php
include("db_connection.php");

$query = "SELECT cliente_nome, cliente_endereco FROM cliente";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Exibir a lista de clientes
echo "<h1>Lista de Clientes</h1>";
echo "<table>";
echo "<tr><th>Nome</th><th>Endereço</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>{$row['cliente_nome']}</td><td>{$row['cliente_endereco']}</td></tr>";
}

echo "</table>";

mysqli_close($conexao);
?>
