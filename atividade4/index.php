<?php require_once 'carro.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular custo por km</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div>
<h2>Informações do Veículo</h2>

<form method="post">
    <label>Modelo: <input type="text" name="modelo" required></label><br><br>

    <label>Tanque cheio (litros): <input type="number" name="tanque" step="0.1" min="1" required></label><br><br>
    <label>Consumo (km por litro): <input type="number" name="consumo" step="0.1" min="1" required></label><br><br>

    <label>Combustível:</label><br>
    <input type="radio" name="combustivel" value="etanol" checked> Etanol<br>
    <input type="radio" name="combustivel" value="gasolina"> Gasolina<br><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = htmlspecialchars($_POST['modelo']);
    $combustivel = htmlspecialchars($_POST['combustivel']);
    $tanque = filter_input(INPUT_POST, 'tanque', FILTER_VALIDATE_FLOAT);
    $consumo = filter_input(INPUT_POST, 'consumo', FILTER_VALIDATE_FLOAT);

    if ($tanque > 0 && $consumo > 0) {
        $carro = new Carro($modelo, $combustivel, $tanque, $consumo);

        $precoCombustivel = $carro->getPrecoCombustivel();
        $custoPorKm = $carro->calcularCustoPorKm();

        echo "<h3>Resumo do Veículo:</h3>";
        echo $carro->getResumo();
        echo "<ul>";
        echo "<li>Preço do Combustível: R$ " . number_format($precoCombustivel, 2, ',', '.') . "</li>";
        echo "<li><strong>Custo por Km: R$ " . number_format($custoPorKm, 2, ',', '.') . "</strong></li>";
        echo "</ul>";
    } else {
        echo "<p style='color:red;'>Erro: insira valores válidos para tanque e consumo.</p>";
    }
}
?>
</div>

</body>
</html>
