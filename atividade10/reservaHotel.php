<?php
class ReservaHotel {
    private string $nome;
    private int $noites;
    private string $tipoQuarto;

    public function __construct(string $nome, int $noites, string $tipoQuarto) {
        $this->nome = $nome;
        $this->noites = $noites;
        $this->tipoQuarto = strtolower($tipoQuarto);
    }

    
    private function precoPorNoite(): float {
        switch ($this->tipoQuarto) {
            case 'luxo':
                return 200;
            case 'suíte':
            case 'suite': 
                return 350;
            default:
                return 120; 
        }
    }

    
    private function valorTotalSemDesconto(): float {
        return $this->precoPorNoite() * $this->noites;
    }

    
    private function aplicarDesconto(float $valor): float {
        if ($this->noites > 5) {
            
            return $valor * 0.9;
        }
        return $valor;
    }

    
    public function calcularValorFinal(): float {
        $valorSemDesconto = $this->valorTotalSemDesconto();
        return $this->aplicarDesconto($valorSemDesconto);
    }

   
    public function exibirResumo(): string {

        $valorSemDesc = $this->valorTotalSemDesconto();
        $valorFinal = $this->calcularValorFinal();
        $desconto = $valorSemDesc - $valorFinal;

        return "
        <h2>Resumo da Reserva</h2>
        <ul>
            <li>Hóspede: {$this->nome}</li>
            <li>Tipo de Quarto: {$this->tipoQuarto}</li>
            <li>Noites: {$this->noites}</li>
            <li>Valor total sem desconto: R$ " . number_format($valorSemDesc, 2, ',', '.') . "</li>
            <li>Desconto: R$ " . number_format($desconto, 2, ',', '.') . "</li>
            <li><strong>Valor final: R$ " . number_format($valorFinal, 2, ',', '.') . "</strong></li>
        </ul>
        <p>Bem-vindo(a), {$this->nome}! Aproveite sua estadia!</p>
        ";
    }
    
}
?>
