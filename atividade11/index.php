<?php require_once 'calculadoraGeometrica.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Geométrica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div>
<h2>Calculadora de Área</h2>

<form method="post">
    <label>Figura:
        <select name="figura" required>
            <option value="">-- Selecione --</option>
            <option value="quadrado" <?php if (isset($_POST['figura']) && $_POST['figura'] === 'quadrado') echo 'selected'; ?>>Quadrado</option>
            <option value="retângulo" <?php if (isset($_POST['figura']) && $_POST['figura'] === 'retângulo') echo 'selected'; ?>>Retângulo</option>
            <option value="círculo" <?php if (isset($_POST['figura']) && $_POST['figura'] === 'círculo') echo 'selected'; ?>>Círculo</option>
        </select>
    </label><br><br>

    <label>Medida 1:
        <input type="number" name="medida1" step="0.01" min="0" required value="<?php echo isset($_POST['medida1']) ? htmlspecialchars($_POST['medida1']) : ''; ?>">
    </label><br><br>

    <label>Medida 2 (se aplicável):
        <input type="number" name="medida2" step="0.01" min="0" value="<?php echo isset($_POST['medida2']) ? htmlspecialchars($_POST['medida2']) : ''; ?>">
    </label><br><br>

    <button type="submit">Calcular</button>
</form>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $figura = htmlspecialchars($_POST['figura']);
    $medida1 = floatval($_POST['medida1']);
    $medida2 = isset($_POST['medida2']) && $_POST['medida2'] !== '' ? floatval($_POST['medida2']) : null;

    if (($figura === 'retângulo' || $figura === 'retangulo') && ($medida2 === null || $medida2 <= 0)) {
        echo "<p style='color:red;'>Para o retângulo, informe também a <strong>Medida 2</strong> (altura).</p>";
    } else {

        $calc = new CalculadoraGeometrica($figura, $medida1, $medida2);
        $area = $calc->calcularArea();
        $tipo = $calc->getFigura();

        echo "<h3>Resultado:</h3>";
        echo "<ul>";
        echo "<li>Figura: <strong>{$tipo}</strong></li>";
        echo "<li>Área: <strong>" . number_format($area, 2, ',', '.') . " unidades²</strong></li>";
        echo "</ul>";
    }

}
?>
</div>

</body>
</html>
