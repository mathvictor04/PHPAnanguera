<?php
    namespace ClinicaVeterinaria\projeto\DAO;
    use ClinicaVeterinaria\projeto\DAO\Conexao;

    class Atualizar{
        function atualizar(Conexao $conexao,
                           int $codigo,
                           string $campo,
                           string $novoDado)
        {
            try{
                $conn = $conexao->conectar();//Abrir a conexão com o banco
                $sql = "update veterinario set $campo = '$novoDado' where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    return "<br><br>Dado Atualizado com sucesso!";
                }
            }catch(Exception $erro){
                return "<br><br>Algo deu errado<br><br> $erro";
            }

        }//fim do metodo
    }//fim da classe



?>