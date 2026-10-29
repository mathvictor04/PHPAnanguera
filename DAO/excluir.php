<?php
    namespace ClinicaVeterinaria\projeto\DAO;
    use ClinicaVeterinaria\projeto\DAO\Conexao;

    Class Excluir{
        function ExcluirVeterinario(Conexao $conexao, int $codigo){
            try{
                $conn = $conexao->conectar();
                $sql = "delete from veterinario where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    return "<br><br>Excluido com sucesso!";
                }
                return "<br><br>Não Excluido!";
            }catch(Exception $erro){
                return "Algo deu errado! <br><br> $erro";
            }
        }//fim da function
    }//fim do excluir


?>