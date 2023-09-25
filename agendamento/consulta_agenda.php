<?php
include("../conexao.php");

$query = "SELECT agendamento_procedimento, DATA, fk_animal_code, cliente_nome FROM agendamento";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Exibir a lista de agendamentos
echo "<h1>Lista de Agendamentos</h1>";
echo "<table>";
echo "<tr><th>Procedimento</th><th>Data</th><th>Nome do Animal</th><th>Nome do Cliente</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>{$row['agendamento_procedimento']}</td><td>{$row['DATA']}</td><td>{$row['fk_animal_code']}</td><td>{$row['fk_cliente_cpf']}</td></tr>";
}

echo "</table>";

mysqli_close($conexao);
?>
