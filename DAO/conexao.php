<?php
     namespace ClinicaVeterinaria\projeto\DAO;

    class Conexao{
        function conectar(){
            try{
                $coon = mysqli_connect('localhost', 'root', '', 'clinicaVeterinaria');
                if($coon){
                    return $coon;
                    echo "Conectado!";
                }else{
                    echo "Conexão Falhou!";
                }

            }
            catch(Exception $erro)
            {
                echo "Algo deu errado" + $erro;
            }//fim do catch
        }//fim do conectar
    }//fim da conexao




?>