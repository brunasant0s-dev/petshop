<?php
if(isset($_POST['submit'])) {
    // Processar o formulário de exclusão aqui
    $animal_id = $_POST['animal_cod'];

    // Conecte-se ao banco de dados e exclua o animal
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_petshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "DELETE FROM animais WHERE ID=$animal_cod";

    if ($conn->query($sql) === TRUE) {
        echo "Animal excluído com sucesso!";
    } else {
        echo "Erro ao excluir o animal: " . $conn->error;
    }

    $conn->close();
}

// Formulário HTML para excluir um animal
?>
<form method="POST" action="exclui_animal.php">
    <label for="animal_cod">ID do Animal a ser Excluído:</label>
    <input type="text" name="animal_cod" required>
    <br>
    <input type="submit" name="submit" value="Excluir Animal">
</form>
