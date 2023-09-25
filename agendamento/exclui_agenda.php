<?php
if (isset($_POST['submit'])) {
    // Processar o formulário de exclusão aqui
    $agenda_id = $_POST['agenda_id'];

    // Conecte-se ao banco de dados e exclua o agendamento
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "nome_do_banco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "DELETE FROM agendamentos WHERE ID=$agenda_id";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento excluído com sucesso!";
    } else {
        echo "Erro ao excluir o agendamento: " . $conn->error;
    }

    $conn->close();
}

// Formulário HTML para excluir um agendamento
?>
<!DOCTYPE html>
<html>
<head>
    <title>Excluir Agendamento</title>
</head>
<body>
    <h2>Excluir Agendamento</h2>
    <form method="POST" action="exclui_agenda.php">
        <label for="agenda_id">ID do Agendamento a ser Excluído:</label>
        <input type="text" name="agenda_id" required>
        <br>
        <input type="submit" name="submit" value="Excluir Agendamento">
    </form>
</body>
</html>
