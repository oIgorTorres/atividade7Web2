<?php
class Pessoa {
    private string $nome;
    private float $peso;
    private float $altura;

    public function __construct(string $nome, float $peso, float $altura) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    
    public function calcularIMC(): float {
        if ($this->altura <= 0) {
            return 0;
        }
        return $this->peso / ($this->altura ** 2);
    }

    public function classificarIMC(): string {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Peso normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    public function exibirResultado(): string {
        $imc = $this->calcularIMC();
        $classificacao = $this->classificarIMC();

        return "
        <h2>Resultado:</h2>
        <ul>
            <li>Nome: {$this->nome}</li>
            <li>Peso: {$this->peso} kg</li>
            <li>Altura: {$this->altura} m</li>
            <li>IMC: " . number_format($imc, 2, ',', '.') . "</li>
            <li>Classificação: <strong>{$classificacao}</strong></li>
        </ul>
        ";
    }
}
?>
