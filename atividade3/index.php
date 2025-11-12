<?php require_once 'pedido.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Compra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div>
<h2>Informações do Pedido</h2>

<form method="post">
    <label>Produto: <input type="text" name="produto" required></label><br><br>
    <label>Quantidade: <input type="number" name="quantidade" min="1" required></label><br><br>
    <label>Preço Unitário (R$): <input type="number" name="preco" step="0.01" min="0" required></label><br><br>

    <label>Tipo de Cliente:</label><br>
    <input type="radio" name="tipo" value="normal" checked> Normal<br>
    <input type="radio" name="tipo" value="premium"> Premium<br><br>

    <button type="submit">Calcular Pedido</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $produto = htmlspecialchars($_POST['produto']);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $tipo = htmlspecialchars($_POST['tipo']);

    if ($quantidade > 0 && $preco >= 0) {
        $pedido = new Pedido($produto, $quantidade, $preco, $tipo);

        $totalBruto = $pedido->calcularTotalBruto();
        $desconto = $pedido->calcularDesconto();
        $imposto = $pedido->calcularImposto();
        $totalFinal = $pedido->calcularTotalFinal();

        echo "<h3>Resumo do Pedido:</h3>";
        echo $pedido->getResumo();
        echo "<ul>";
        echo "<li>Total Bruto: R$ " . number_format($totalBruto, 2, ',', '.') . "</li>";
        echo "<li>Desconto: R$ " . number_format($desconto, 2, ',', '.') . "</li>";
        echo "<li>Imposto: R$ " . number_format($imposto, 2, ',', '.') . "</li>";
        echo "<li><strong>Total Final: R$ " . number_format($totalFinal, 2, ',', '.') . "</strong></li>";
        echo "</ul>";
    } else {
        echo "<p style='color:red;'>Erro: insira valores válidos para quantidade e preço.</p>";
    }
}
?>
     <a id="voltar" href="/atividade7Web2/index.php"><strong> Voltar </strong> </a>
</div>
</body>
</html>
