<?php
class Aluno {
    private string $nome;
    private string $disciplina;
    private float $nota1;
    private float $nota2;
    private float $nota3;


    public function __construct($nome, $disciplina, $nota1, $nota2, $nota3) {
        $this->nome = $nome;
        $this->disciplina = $disciplina;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
    }

     public function getResumo(){
        return "Aluno: {$this->nome}, Disciplina: {$this->disciplina}";
    }

     public function calcularMedia(): float {
        return ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }

    public function avaliarAluno(): string {
        $media = $this->calcularMedia();

        if ($media >= 7) {
            return "Aprovado";
        } elseif ($media >= 5) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }
}
?>
