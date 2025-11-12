<?php require_once 'produto.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div>
<h2>Cadastro e Movimentação de Produto</h2>

<form method="post">
    <label>Nome do Produto: <input type="text" name="nome" required></label><br><br>
    <label>Quantidade em Estoque: <input type="number" name="estoque" min="0" required></label><br><br>
    <label>Valor Unitário (R$): <input type="number" step="0.01" name="valor" min="0" required></label><br><br>

    <label>Quantidade da Movimentação: <input type="number" name="quantidade" min="1" required></label><br><br>

    <label>Movimentação:</label><br>
    <input type="radio" name="movimento" value="entrada" checked> Entrada<br>
    <input type="radio" name="movimento" value="saida"> Saída<br><br>

    <button type="submit">Processar Movimentação</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = htmlspecialchars($_POST['nome']);
    $estoque = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
    $movimento = $_POST['movimento'];
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

    if ($estoque !== false && $valor !== false && $quantidade > 0) {
        
        $produto = new Produto($nome, $estoque, $valor);

        
        if ($movimento === 'entrada') {
            $produto->entradaEstoque($quantidade);
            $mensagem = "Entrada de {$quantidade} unidade(s) realizada com sucesso.";
        } elseif ($movimento === 'saida') {
            if ($quantidade <= $produto->getEstoque()) {
                $produto->saidaEstoque($quantidade);
                $mensagem = "Saída de {$quantidade} unidade(s) realizada com sucesso.";
            } else {
                $mensagem = "Erro: quantidade de saída maior que o estoque disponível.";
            }
        }

        
        echo "<h3>Resultado da Operação:</h3>";
        echo "<p>{$mensagem}</p>";
        echo $produto->getResumo();
    } else {
        echo "<p style='color:red;'>Erro: insira valores válidos.</p>";
    }
}
?>
     <a id="voltar" href="/atividade7Web2/index.php"><strong> Voltar </strong> </a>
</div>

</body>
</html>
