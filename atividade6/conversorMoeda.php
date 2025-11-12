<?php

class Conversor{

private float $valor;


 public function __construct(float $valor) {
        $this->valor = $valor;
    }


    public function converterDolar(){
       return $this->valor / 5.29;
    }

    public function converterEuro(){
       return $this->valor / 6.12;
    }



     public function exibirDetalhes(){
        return "
        <ul>
            <li>Reais para dolar: USD " . number_format($this->converterDolar(), 2, ',', '.') . "</li>
            <li>Reais para euros:  " . number_format($this->converterEuro(), 2, ',', '.') . "</li>
        </ul>
        ";
    }


}
?>
