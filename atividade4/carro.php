<?php
class Carro {
    private string $modelo;
    private string $combustivel;
    private float $tanqueLitros;
    private float $consumoKmPorLitro;

    public function __construct(string $modelo, string $combustivel, float $tanqueLitros, float $consumoKmPorLitro) {
        $this->modelo = $modelo;
        $this->combustivel = strtolower($combustivel);
        $this->tanqueLitros = $tanqueLitros;
        $this->consumoKmPorLitro = $consumoKmPorLitro;
    }

    
    public function getPrecoCombustivel(): float {
        if ($this->combustivel === 'etanol') {
            return 3.59; 
        } elseif ($this->combustivel === 'gasolina') {
            return 5.49; 
        } else {
            return 0; 
        }
    }

    
    public function calcularCustoPorKm(): float {
        $preco = $this->getPrecoCombustivel();

        if ($this->consumoKmPorLitro <= 0) {
            return 0; 
        }

        
        return $preco / $this->consumoKmPorLitro;
    }

    
    public function getResumo(): string {
        return "
        <ul>
            <li>Modelo: {$this->modelo}</li>
            <li>Combustível: " . ucfirst($this->combustivel) . "</li>
            <li>Tanque Cheio: {$this->tanqueLitros} L</li>
            <li>Consumo: {$this->consumoKmPorLitro} km/L</li>
        </ul>
        ";
    }
}
?>
