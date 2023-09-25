<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta animais
$sql = "SELECT NOME, RACA, DONO FROM animais";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>NOME</th><th>RAÇA</th><th>DONO</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["NOME"]."</td><td>".$row["RACA"]."</td><td>".$row["DONO"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum animal cadastrado.";
}

$conn->close();
?>
