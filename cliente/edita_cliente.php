<?php
include("../conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta o cliente pelo ID
    $query = "SELECT cliente_nome, cliente_endereco FROM cliente WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);
    
    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }
    
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        $nome = $row['cliente_nome'];
        $endereco = $row['cliente_endereco'];
    } else {
        echo "Cliente não encontrado.";
        exit;
    }
} else {
    echo "ID do cliente não especificado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNome = $_POST['novoNome'];
    $novoEndereco = $_POST['novoEndereco'];
    
    // Atualiza o cliente no banco de dados
    $query = "UPDATE clientes SET Nome = '$novoNome', Endereco = '$novoEndereco' WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);
    
    if ($resultado) {
        echo "Cliente atualizado com sucesso!";
    } else {
        die("Erro na atualização do cliente: " . mysqli_error($conexao));
    }
}

mysqli_close($conexao);
?>

<h1>Editar Cliente</h1>
<form method="post" action="">
    <label for="novoNome">Nome:</label>
    <input type="text" name="novoNome" value="<?php echo $novoNome; ?>" required><br>
    <label for="novoEndereco">Endereço:</label>
    <input type="text" name="novoEndereco" value="<?php echo $novoEndereco; ?>" required><br>
    <input type="submit" value="Atualizar">
</form>
