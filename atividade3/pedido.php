<?php
class Pedido {
    private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente;

    public function __construct(string $produto, int $quantidade, float $precoUnitario, string $tipoCliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = strtolower($tipoCliente);
    }

    // Retorna o total bruto (sem desconto nem imposto)
    public function calcularTotalBruto(): float {
        return $this->quantidade * $this->precoUnitario;
    }

    // Retorna o valor do desconto
    public function calcularDesconto(): float {
        $totalBruto = $this->calcularTotalBruto();
        if ($this->tipoCliente === 'premium') {
            return $totalBruto * 0.10; // 10% de desconto
        }
        return 0;
    }

    // Retorna o valor do imposto
    public function calcularImposto(): float {
        $totalBruto = $this->calcularTotalBruto();
        return $totalBruto * 0.08; // 8% de imposto
    }

    // Retorna o total final (considerando desconto e imposto)
    public function calcularTotalFinal(): float {
        $totalBruto = $this->calcularTotalBruto();
        $desconto = $this->calcularDesconto();
        $imposto = $this->calcularImposto();
        return $totalBruto - $desconto + $imposto;
    }

    // Retorna um resumo legível do pedido
    public function getResumo(): string {
        return "
        <ul>
            <li>Produto: {$this->produto}</li>
            <li>Quantidade: {$this->quantidade}</li>
            <li>Preço Unitário: R$ " . number_format($this->precoUnitario, 2, ',', '.') . "</li>
            <li>Tipo de Cliente: " . ucfirst($this->tipoCliente) . "</li>
        </ul>
        ";
    }
}
?>
