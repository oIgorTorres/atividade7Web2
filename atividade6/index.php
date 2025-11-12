<?php require_once 'conversorMoeda.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter reais para dolar/euro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div>
    <h2>Insira o valor em reais</h2>
    <form method="post">
        <label>Valor em reais: <input type="number" step="0.01" name="valor" required></label>
        <button type="submit">Calcular</button>
    </form>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

        if ($valor !== false && $valor >= 0) {

            $conversor = new Conversor(
                (float)$_POST['valor'],
            );


            echo "<h3>Resultado:</h3>";
            echo $conversor->exibirDetalhes();

        } else {
        echo "<p>Erro: insira números válidos.</p>";
    }
}
    ?>
</div>
</body>

</html>