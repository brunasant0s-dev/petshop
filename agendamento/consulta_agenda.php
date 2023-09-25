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

// Consulta agendamentos
$sql = "SELECT a.PROCEDIMENTO, a.DATA, an.NOME AS NOME_ANIMAL, c.NOME AS NOME_CLIENTE
        FROM agendamentos a
        INNER JOIN animais an ON a.ID_ANIMAL = an.ID
        INNER JOIN clientes c ON a.ID_CLIENTE = c.ID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>PROCEDIMENTO</th><th>DATA</th><th>NOME DO ANIMAL</th><th>NOME DO CLIENTE</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["PROCEDIMENTO"] . "</td><td>" . $row["DATA"] . "</td><td>" . $row["NOME_ANIMAL"] . "</td><td>" . $row["NOME_CLIENTE"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum agendamento cadastrado.";
}

$conn->close();
?>
