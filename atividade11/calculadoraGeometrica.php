<?php
class CalculadoraGeometrica {
    private string $figura;
    private float $medida1;
    private ?float $medida2;

    public function __construct(string $figura, float $medida1, ?float $medida2 = null) {
        $this->figura = strtolower($figura);
        $this->medida1 = $medida1;
        $this->medida2 = $medida2;
    }

    public function calcularArea(): float {
        switch ($this->figura) {
            case 'quadrado':
                return pow($this->medida1, 2);
            case 'retângulo':
            case 'retangulo':
                return $this->medida1 * ($this->medida2 ?? 0);
            case 'círculo':
            case 'circulo':
                return pi() * pow($this->medida1, 2);
            default:
                return 0;
        }
    }

    public function getFigura(): string {
        return ucfirst($this->figura);
    }
}
?>
