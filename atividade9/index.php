<?php require_once 'pessoa.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
    <h1>Calculadora de IMC</h1>

    <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Peso (kg):</label>
        <input type="number" name="peso" step="0.1" required><br><br>

        <label>Altura (m):</label>
        <input type="number" name="altura" step="0.01" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = htmlspecialchars($_POST['nome']);
        $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
        $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT);

        if ($peso && $altura && $peso > 0 && $altura > 0) {
            $pessoa = new Pessoa($nome, $peso, $altura);
            echo $pessoa->exibirResultado();
        } else {
            echo "<p style='color:red;'>Informe valores válidos para peso e altura.</p>";
        }
    }
    ?>
         <a id="voltar" href="/atividade7Web2/index.php"><strong> Voltar </strong> </a>
    </div>
</body>
</html>
