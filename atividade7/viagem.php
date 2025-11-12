<?php
class Viagem {
    private string $origem;
    private string $destino;
    private float $distancia; 
    private float $tempo; 
    private string $tipo; 
    private float $preco; 

    public function __construct(string $origem, string $destino, float $distancia, float $tempo, string $tipo, float $preco) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempo = $tempo;
        $this->tipo = $tipo;
        $this->preco = $preco;
    }

    
    public function calcularVelocidadeMedia(): float {
        if ($this->tempo <= 0) return 0;
        return $this->distancia / $this->tempo;
    }

    
    private function consumoPorTipo(): float {
        switch ($this->tipo) {
            case 'carro':
                return 12; 
            case 'moto':
                return 25; 
            case 'caminhao':
                return 5;  
            default:
                return 10; 
        }
    }

    
    public function calcularConsumo(): float {
        $consumo = $this->consumoPorTipo();
        if ($consumo <= 0) return 0;
        return $this->distancia / $consumo;
    }

    
    public function calcularCusto(): float {
        return $this->calcularConsumo() * $this->preco;
    }

    
    public function exibirResumo(): string {
        return "
        <ul>
            <li>Origem: {$this->origem}</li>
            <li>Destino: {$this->destino}</li>
            <li>Distância: {$this->distancia} km</li>
            <li>Tempo estimado: {$this->tempo} h</li>
            <li>Tipo de veículo: {$this->tipo}</li>
            <li>Velocidade média: " . number_format($this->calcularVelocidadeMedia(), 2, ',', '.') . " km/h</li>
            <li>Consumo estimado: " . number_format($this->calcularConsumo(), 2, ',', '.') . " L</li>
            <li>Custo total da viagem: <strong>R$ " . number_format($this->calcularCusto(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>
