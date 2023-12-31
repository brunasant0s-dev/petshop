<?php
include("../conexao.php");

if(isset($_POST['submit'])) {
    // Processar o formulário de edição aqui
    $animal_id = $_POST['animal_cod'];
    $novo_nome = $_POST['novo_nome'];
    $nova_raca = $_POST['nova_raca'];

    // Conecte-se ao banco de dados e atualize os dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_petshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "UPDATE animais SET NOME='$novo_nome', RACA='$nova_raca' WHERE ID=$animal_cod";

    if ($conn->query($sql) === TRUE) {
        echo "Animal atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o animal: " . $conn->error;
    }

    $conn->close();
}

// Formulário HTML para editar um animal
?>
<form method="POST" action="edita_animal.php">
    <label for="animal_cod">ID do Animal:</label>
    <input type="text" name="animal_cod" required>
    <br>
    <label for="novo_nome">Novo Nome:</label>
    <input type="text" name="novo_nome" required>
    <br>
    <label for="nova_raca">Nova Raça:</label>
    <input type="text" name="nova_raca" required>
    <br>
    <input type="submit" name="submit" value="Editar Animal">
</form>
