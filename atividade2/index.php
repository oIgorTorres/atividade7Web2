<?php require_once 'aluno.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular média</title>
    <link rel="stylesheet" href="style.css">

    
</head>
<body>
    
<div>
<h2>Informações do Aluno</h2>

    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Disciplina: <input type="text" name="disciplina" required></label><br><br>
        <label>Nota 1: <input type="number" step="0.1" min="0" max="10" step="0.1" name="nota1" required></label><br><br>
        <label>Nota 2: <input type="number" step="0.1" min="0" max="10" step="0.1" name="nota2" required></label><br><br>
        <label>Nota 3: <input type="number" step="0.1" min="0" max="10" step="0.1" name="nota3" required></label><br><br>
        <button type="submit">Calcular</button>
    </form>


    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$nota1 = filter_input(INPUT_POST, 'nota1', FILTER_VALIDATE_FLOAT);
$nota2 = filter_input(INPUT_POST, 'nota2', FILTER_VALIDATE_FLOAT);
$nota3 = filter_input(INPUT_POST, 'nota3', FILTER_VALIDATE_FLOAT);

if (
    $nota1 !== false && $nota2 !== false && $nota3 !== false &&
    $nota1 >= 0 && $nota1 <= 10 &&
    $nota2 >= 0 && $nota2 <= 10 &&
    $nota3 >= 0 && $nota3 <= 10
) {
    $aluno = new Aluno(
        htmlspecialchars($_POST['nome']),
        htmlspecialchars($_POST['disciplina']),
        $nota1,
        $nota2,
        $nota3
    );

    $media = $aluno->calcularMedia();
    $situacao = $aluno->avaliarAluno();

    echo "<h3>Resultado:</h3>";
    echo "<ul>";
    echo "<li>{$aluno->getResumo()}</li>";
    echo "<li>Média final: " . number_format($media, 2, ',', '.') . "</li>";
    echo "<li>Situação: <strong>{$situacao}</strong></li>";
    echo "</ul>";
} else {
    echo "<p>Erro: insira notas válidas entre 0 e 10.</p>";
}
}
    ?>
     <a id="voltar" href="/atividade7Web2/index.php"><strong> Voltar </strong> </a>
</div>

</body>
</html>