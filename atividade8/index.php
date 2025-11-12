<?php require_once 'calculadoraFinanceira.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Financeira</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
    <h1>Calculadora Financeira</h1>

    <form method="post">
        <label>Valor da compra (R$):</label>
        <input type="number" name="valor" step="0.01" required><br><br>

        <label>Número de parcelas:</label>
        <input type="number" name="parcelas" required><br><br>

        <label>Taxa de juros mensal (%):</label>
        <input type="number" name="juros" step="0.01" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
        $parcelas = filter_input(INPUT_POST, 'parcelas', FILTER_VALIDATE_INT);
        $juros = filter_input(INPUT_POST, 'juros', FILTER_VALIDATE_FLOAT);

        if ($valor && $parcelas && $juros !== false) {

            $calc = new CalculadoraFinanceira($valor, $parcelas, $juros);
            
            echo $calc->exibirResultado();
        } else {
            echo "<p>Por favor, preencha todos os campos corretamente.</p>";
        }
    }
    ?>
         <a id="voltar" href="/atividade7Web2/index.php"><strong> Voltar </strong> </a>
    </div>
</body>
</html>
