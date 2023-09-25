<?php
include("../conexao.php");

$query = "SELECT cliente_nome, cliente_endereco FROM cliente";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>     

<body>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <table border="2">
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr><td>{$row['cliente_nome']}</td><td>{$row['cliente_endereco']}</td><td class='actions'>editar</td></tr><td class='actions'>excluir</td></tr>";
            }

            echo "</table>";
            ?>
    </div>
</body>

</html>
