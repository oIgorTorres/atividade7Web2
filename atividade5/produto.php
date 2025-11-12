<?php
class Produto {
    private string $nome;
    private int $estoque;
    private float $valorUnitario;

    public function __construct(string $nome, int $estoque, float $valorUnitario) {
        $this->nome = $nome;
        $this->estoque = $estoque;
        $this->valorUnitario = $valorUnitario;
    }

    // Entrada de produtos no estoque
    public function entradaEstoque(int $quantidade): void {
        if ($quantidade > 0) {
            $this->estoque += $quantidade;
        }
    }

    // Saída de produtos do estoque
    public function saidaEstoque(int $quantidade): void {
        if ($quantidade > 0 && $quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
        }
    }

    // Valor total em estoque
    public function valorTotal(): float {
        return $this->estoque * $this->valorUnitario;
    }

    // Exibe informações do produto
    public function getResumo(): string {
        return "
        <ul>
            <li>Produto: {$this->nome}</li>
            <li>Estoque atual: {$this->estoque} unidades</li>
            <li>Valor unitário: R$ " . number_format($this->valorUnitario, 2, ',', '.') . "</li>
            <li>Valor total em estoque: <strong>R$ " . number_format($this->valorTotal(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }

    // Getters para uso no index
    public function getNome(): string { return $this->nome; }
    public function getEstoque(): int { return $this->estoque; }
    public function getValorUnitario(): float { return $this->valorUnitario; }
}
?>
