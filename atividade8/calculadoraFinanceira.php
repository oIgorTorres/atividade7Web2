<?php
class CalculadoraFinanceira {
    private float $valor;
    private int $parcelas;
    private float $juros; 

    public function __construct(float $valor, int $parcelas, float $juros) {
        $this->valor = $valor;
        $this->parcelas = $parcelas;
        $this->juros = $juros / 100; 
    }

    public function calcularParcela(): float {
        return $this->valor * pow((1 + $this->juros), $this->parcelas);
    }

    public function totalAPagar(): float {
        return $this->calcularParcela();
    }

    public function diferencaJuros(): float {
        return $this->totalAPagar() - $this->valor;
    }

    public function exibirResultado(): string {
        return "
        <h2>Resultado do Cálculo</h2>
        <ul>
            <li>Valor inicial: R$ " . number_format($this->valor, 2, ',', '.') . "</li>
            <li>Número de parcelas: {$this->parcelas}</li>
            <li>Taxa de juros mensal: " . ($this->juros * 100) . "%</li>
            <li>Total a pagar: R$ " . number_format($this->totalAPagar(), 2, ',', '.') . "</li>
            <li>Juros pagos: R$ " . number_format($this->diferencaJuros(), 2, ',', '.') . "</li>
        </ul>";
    }
}
?>
