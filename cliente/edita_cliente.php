<?php
if(isset($_POST['submit'])) {
    // Processar o formulário de edição aqui
    $cliente_id = $_POST['cliente_id'];
    $novo_nome = $_POST['novo_nome'];
    $novo_endereco = $_POST['novo_endereco'];

    // Conecte-se ao banco de dados e atualize os dados do cliente
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "nome_do_banco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "UPDATE clientes SET Nome='$novo_nome', Endereco='$novo_endereco' WHERE ID=$cliente_id";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o cliente: " . $conn->error;
    }

    $conn->close();
}

// Formulário HTML para editar um cliente
?>
<form method="POST" action="edita_cliente.php">
    <label for="cliente_id">ID do Cliente:</label>
    <input type="text" name="cliente_id" required>
    <br>
    <label for="novo_nome">Novo Nome:</label>
    <input type="text" name="novo_nome" required>
    <br>
    <label for="novo_endereco">Novo Endereço:</label>
    <input type="text" name="novo_endereco" required>
    <br>
    <input type="submit" name="submit" value="Editar Cliente">
</form>
