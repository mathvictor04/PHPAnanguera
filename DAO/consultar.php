<?php
    namespace ClinicaVeterinaria\projeto\DAO;
    use ClinicaVeterinaria\projeto\DAO\Conexao;

    class Consultar{
        function consultarVeterinario(Conexao $conexao, int $codigo){
            try
            {
                $conn = $conexao->conectar();
                $sql = "select * from veterinario where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql);
                //Buscar os dados no banco
                while($dados = mysqli_fetch_Array($result)){
                    if($dados['codigo'] == $codigo){
                       return '<br>Codigo: '.$dados['codigo'].
                              '<br>Nome: '.$dados['nome'].
                              '<br>Especialidade: '.$dados['especialidade'].
                              '<br>Telefone: '.$dados['telefone'].
                              '<br>Endereço: '.$dados['endereco'].
                              '<br>Salario: '.$dados['salario'];
                       
                    }//fim do if
                }//fim do while
            }
            catch(Exception $erro)
            {
                return "<br><br>Algo deu errado! <br><br> $erro";
            }
        }
    }
    



?>