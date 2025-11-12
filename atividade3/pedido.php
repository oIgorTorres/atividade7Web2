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

    
    public function calcularTotalBruto(): float {
        return $this->quantidade * $this->precoUnitario;
    }

   
    public function calcularDesconto(): float {
        $totalBruto = $this->calcularTotalBruto();
        if ($this->tipoCliente === 'premium') {
            return $totalBruto * 0.10; // 10% de desconto
        }
        return 0;
    }

   
    public function calcularImposto(): float {
        $totalBruto = $this->calcularTotalBruto();
        return $totalBruto * 0.08; // 8% de imposto
    }

    
    public function calcularTotalFinal(): float {
        $totalBruto = $this->calcularTotalBruto();
        $desconto = $this->calcularDesconto();
        $imposto = $this->calcularImposto();
        return $totalBruto - $desconto + $imposto;
    }

   
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
