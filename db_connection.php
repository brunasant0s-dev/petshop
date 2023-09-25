<?php
$host = "seu_host";
$usuario = "seu_usuario";
$senha = "";
$banco = "db_petshop";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
