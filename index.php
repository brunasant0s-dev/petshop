<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta, Agendamento e Visualização</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <header>
        <h1>Consulta, Agendamento e Visualização de Dados</h1>
    </header>

    <main>
        <form action="consulta.php" method="post">
            <input type="submit" name="consultar" value="Consultar Dados">
        </form>

        <form action="agendamento.php" method="post">
            <input type="submit" name="agendar" value="Agendar Dados">
        </form>

        <form action="visualizacao.php" method="post">
            <input type="submit" name="visualizar" value="Visualizar Dados">
        </form>
    </main>

</body>

</html>