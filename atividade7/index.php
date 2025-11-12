<?php require_once 'viagem.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Viagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<div>
<h2>Informações da Viagem</h2>

<form method="post">
    <label>Origem: <input type="text" name="origem" required></label><br><br>
    <label>Destino: <input type="text" name="destino" required></label><br><br>
    <label>Distância (km): <input type="number" name="distancia" step="0.1" min="0" required></label><br><br>
    <label>Tempo estimado (h): <input type="number" name="tempo" step="0.1" min="0" required></label><br><br>

    <label>Preço do combustível (R$/litro): 
        <input type="number" name="preco" step="0.01" min="0" required>
    </label><br><br>

    <fieldset>
        <legend>Tipo de veículo:</legend>
        <label><input type="radio" name="tipo" value="carro" checked required> Carro</label><br>
        <label><input type="radio" name="tipo" value="moto"> Moto</label><br>
        <label><input type="radio" name="tipo" value="caminhao"> Caminhão</label>
    </fieldset><br>

    <button type="submit">Calcular</button>
</form>

<hr>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $origem = htmlspecialchars($_POST['origem']);
    $destino = htmlspecialchars($_POST['destino']);
    $distancia = (float)$_POST['distancia'];
    $tempo = (float)$_POST['tempo'];
    $tipo = $_POST['tipo'];
    $preco = (float)$_POST['preco'];

    if ($distancia > 0 && $tempo > 0 && $preco > 0) {
        $viagem = new Viagem($origem, $destino, $distancia, $tempo, $tipo, $preco);

        echo "<h3>Resultado:</h3>";
        echo $viagem->exibirResumo();
    } else {
        echo "<p style='color:red;'>Insira valores válidos para distância, tempo e preço do combustível.</p>";
    }
}
?>
</div>

</body>
</html>
