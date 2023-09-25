<?php
include("../conexao.php");

$query = "SELECT
 * 
FROM
 agendamento
 JOIN animais
    ON agendamento.fk_animal_code = animal.animal_cod;
JOIN cliente 
 ON agendamento.fk_cliente_cpf = cliente.cliente_cpf";

//SELET= ESPECÍFICA AS COLUNAS DA TABELA QUE QUERO EXIBIR
// FROM = ESPECIFICA A TABELA (DE ONDE)
//WHERE = QUANDO, OU SEJA, COM QUAL CONDIÇÃO.

$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Exibir a lista de agendamentos
echo "<h1>Lista de Agendamentos</h1>";
echo "<table>";
echo "<tr><th>Procedimento</th><th>Data</th><th>Nome do Animal</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>{$row['agendamento_procedimento']}</td><td>{$row['agendamento_data']}</td><td>{$row['animal_nome']}</td></tr>";
}

echo "</table>";

mysqli_close($conexao);
?>