<?php
    namespace ClinicaVeterinaria\projeto\PHP;

    class Veterinario{
        //declarar as variaveis
        private int $codigo;
        private string $nome;
        private float $salario;
        private string $especialidade;
        private string $endereco;
        private string $telefone;

        // //Método Construtor
        // public function __construct(){
        //     $this->codigo = 0;
        //     $this->nome = "";
        //     $this->especialidade = "";
        //     $this->salario = 0;
        //     $this->endereco = "";
        //     $this->telefone = "";
        // }//Fim do Construtor

        public function __construct(int $codigo, string $nome, string $especialidade, float $salario, string $endereco, string $telefone){
            $this->codigo        = $codigo;
            $this->nome          = $nome;
            $this->especialidade = $especialidade;
            $this->salario       = $salario;
            $this->endereco      = $endereco;
            $this->telefone      = $telefone;
        }//fim do construtor

        public function __get(string $dados):mixed
        {
            return $this->dados;
        }//fim do get

        public function __set(string $variavel, string $novoDado):void
        {
            $this->variavel = $novoDado;
        }//fim do set

        public function imprimir():string
        {
            return "<br>Código: " . $this->codigo.
                    "<br>Nome: " . $this->nome.
                    "<br>Especialidade: " . $this->especialidade.
                    "<br>Sálario: R$ " . $this->salario.
                    "<br>Endereço: " . $this->endereco.
                    "<br>Telefone: " . $this->telefone."<br><br>";
        }//fim do imprimir

    }//fim da classe
?>