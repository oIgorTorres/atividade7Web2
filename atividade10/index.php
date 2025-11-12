<?php require_once 'reservaHotel.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
    <h1>Reserva de Hotel</h1>

    <form method="post">
        <label>Nome do hóspede:</label>
        <input type="text" name="nome" required><br><br>

        <label>Número de noites:</label>
        <input type="number" name="noites" min="1" required><br><br>

        <label>Tipo de quarto:</label><br>
        <label><input type="radio" name="tipo" value="simples" checked> Simples (R$120/noite)</label><br>
        <label><input type="radio" name="tipo" value="luxo"> Luxo (R$200/noite)</label><br>
        <label><input type="radio" name="tipo" value="suíte"> Suíte (R$350/noite)</label><br><br>

        <button type="submit">Calcular Reserva</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = htmlspecialchars($_POST['nome']);
        $noites = filter_input(INPUT_POST, 'noites', FILTER_VALIDATE_INT);
        $tipo = $_POST['tipo'];

        if ($noites && $noites > 0) {
            $reserva = new ReservaHotel($nome, $noites, $tipo);
            echo $reserva->exibirResumo();
        } else {
            echo "<p style='color:red;'>Informe um número válido de noites.</p>";
        }
    }
    ?>
         <a id="voltar" href="/atividade7Web2/index.php"><strong> Voltar </strong> </a>
    </div>
</body>
</html>
