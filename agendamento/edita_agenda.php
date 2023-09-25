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
    $novoProcedimento = $_POST['novoProcedimento'];
    $novaData = $_POST['novaData'];
    
    // Atualiza o agendamento no banco de dados
    $query = "UPDATE agendamentos SET PROCEDIMENTO = '$novoProcedimento', DATA = '$novaData' WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);
    
    if ($resultado) {
        echo "Agendamento atualizado com sucesso!";
    } else {
        die("Erro na atualização do agendamento: " . mysqli_error($conexao));
    }
}

mysqli_close($conexao);
?>

<h1>Editar Agendamento</h1>
<form method="post" action="">
    <label for="novoProcedimento">Procedimento:</label>
    <input type="text" name="novoProcedimento" value="<?php echo $procedimento; ?>" required><br>
    <label for="novaData">Data:</label>
    <input type="date" name="novaData" value="<?php echo $data; ?>" required><br>
    <input type="submit" value="Atualizar">
</form>
