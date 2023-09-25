<?php
// Conecta ao banco de dados (mesmo código que em consulta_animal.php)

// Consulta clientes
$sql = "SELECT Nome, Endereco FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Nome</th><th>Endereço</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Nome"]."</td><td>".$row["Endereco"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente cadastrado.";
}

$conn->close();
?>
