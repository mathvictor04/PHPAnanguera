<?php
    namespace ClinicaVeterinaria\projeto\DAO;
    use ClinicaVeterinaria\projeto\DAO\Conexao;

    class Inserir{
        public function cadastrarVeterinario(Conexao $conexao, string $nome, string $telefone, string $endereco, float $salario, string $especialidade)

        {
            try{
                $conn = $conexao->conectar();//Abre a conexao com o banco
                $sql = "Insert into veterinario(codigo, nome, especialidade, salario, endereco, telefone) values('', '$nome','$especialidade','$salario','$endereco','$telefone')";//Preparando comando
                $result = mysqli_query($conn,$sql);//Executar o comando no bd
                //Verifico se executou ou nao

                if($result){
                    return "<br><br>Inserido com sucesso!";
                }
                    return "<br><br>Nao inserido!";

            }catch(Exception $erro){
                return "<br><br>Impossivel cadastrar cliente <br><br> $erro";
            }
        }//fim do metodo cadastrar
    }//fim da classe



?>