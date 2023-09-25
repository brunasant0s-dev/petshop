<?php
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta o cliente pelo ID
    $query = "SELECT cliente_nome, cliente-endereco FROM cliente WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);
    
    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }
    
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        $nome = $row['cliente_nome'];
        $endereco = $row['cliente_nome'];
    } else {
        echo "Cliente não encontrado.";
        exit;
    }
} else {
    echo "ID do cliente não especificado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Exclui o cliente do banco de dados
    $query = "DELETE FROM cliente WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);
    
    if ($resultado) {
        echo "Cliente excluído com sucesso!";
    } else {
        die("Erro na exclusão do cliente: " . mysqli_error($conexao));
    }
}

mysqli_close($conexao);
?>

<h1>Excluir Cliente</h1>
<p>Tem certeza de que deseja excluir o cliente "<?php echo $nome; ?>" com o endereço "<?php echo $endereco; ?>"?</p>
<form method="post" action="">
    <input type="submit" value="Sim">
    <a href="consulta_cliente.php">Não</a>
</form>
