<?php
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta o agendamento pelo ID
    $query = "SELECT PROCEDIMENTO, DATA, NOME_DO_ANIMAL, NOME_DO_CLIENTE FROM agendamentos WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);
    
    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }
    
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        $procedimento = $row['PROCEDIMENTO'];
        $data = $row['DATA'];
        $nomeAnimal = $row['NOME_DO_ANIMAL'];
        $nomeCliente = $row['NOME_DO_CLIENTE'];
    } else {
        echo "Agendamento não encontrado.";
        exit;
    }
} else {
    echo "ID do agendamento não especificado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Exclui o agendamento do banco de dados
    $query = "DELETE FROM agendamentos WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);
    
    if ($resultado) {
        echo "Agendamento excluído com sucesso!";
    } else {
        die("Erro na exclusão do agendamento: " . mysqli_error($conexao));
    }
}

mysqli_close($conexao);
?>

<h1>Excluir Agendamento</h1>
<p>Tem certeza de que deseja excluir o agendamento para o procedimento "<?php echo $procedimento; ?>" agendado para "<?php echo $data; ?>"?</p>
<form method="post" action="">
    <input type="submit" value="Sim">
    <a href="consulta_agendamento.php">Não</a>
</form>
