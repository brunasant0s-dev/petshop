<!DOCTYPE html>
<html>
<head>
    <title>Consulta, Agendamento e Visualização</title>
</head>
<body>
<h1>Consulta, Agendamento e Visualização de Dados</h1>

<form action="consulta.php" method="post">
    <input type="submit" name="consultar" value="Consultar Dados">
</form>

<form action="agendamento.php" method="post">
    <input type="submit" name="agendar" value="Agendar Dados">
</form>

<form action="visualizacao.php" method="post">
    <input type="submit" name="visualizar" value="Visualizar Dados">
</form>

</body>
</html>
<?php
// Lógica de consulta de dados aqui
echo "Página de Consulta de Dados";
?>
<?php
// Lógica de agendamento de dados aqui
echo "Página de Agendamento de Dados";
?>
<?php
// Lógica de visualização de dados aqui
echo "Página de Visualização de Dados";
?>
