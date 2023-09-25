<?php
if (isset($_POST['submit'])) {
    // Processar o formulário de edição aqui
    $agenda_id = $_POST['agenda_id'];
    $novo_procedimento = $_POST['novo_procedimento'];
    $nova_data = $_POST['nova_data'];

    // Conecte-se ao banco de dados e atualize os dados do agendamento
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "nome_do_banco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "UPDATE agendamentos SET PROCEDIMENTO='$novo_procedimento', DATA='$nova_data' WHERE ID=$agenda_id";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o agendamento: " . $conn->error;
    }

    $conn->close();
}

// Formulário HTML para editar um agendamento
?>
<form method="POST" action="edita_agenda.php">
    <label for="agenda_id">ID do Agendamento:</label>
    <input type="text" name="agenda_id" required>
    <br>
    <label for="novo_procedimento">Novo Procedimento:</label>
    <input type="text" name="novo_procedimento" required>
    <br>
    <label for="nova_data">Nova Data:</label>
    <input type="date" name="nova_data" required>
    <br>
    <input type="submit" name="submit" value="Editar Agendamento">
</form>
