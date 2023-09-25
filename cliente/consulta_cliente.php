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
    <title>Document</title>
</head>

<body>
    <h1>Lista de Clientes</h1>
    <table border="2">
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr><td>{$row['cliente_nome']}</td><td>{$row['cliente_endereco']}</td></tr>";
        }

        echo "</table>";
        ?>
</body>

</html>