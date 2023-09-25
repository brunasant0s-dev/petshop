<?php
if(isset($_POST['submit'])) {
    // Processar o formulário de exclusão aqui
    $cliente_id = $_POST['cliente_id'];

    // Conecte-se ao banco de dados e exclua o cliente
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "nome_do_banco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "DELETE FROM clientes WHERE ID=$cliente_id";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente excluído com sucesso!";
    } else {
        echo "Erro ao excluir o cliente: " . $conn->error;
    }

    $conn->close();
}

// Formulário HTML para excluir um cliente
?>
<form method="POST" action="exclui_cliente.php">
    <label for="cliente_id">ID do Cliente a ser Excluído:</label>
    <input type="text" name="cliente_id" required>
    <br>
    <input type="submit" name="submit" value="Excluir Cliente">
</form>
