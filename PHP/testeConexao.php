<?php

require_once('../DAO/conexao.php');

use ClinicaVeterinaria\projeto\DAO\Conexao;

$conexao = new Conexao();

$conn = $conexao->conectar();

if ($conn) {
    echo "Conectado ao banco de dados com sucesso!";
}

mysqli_close($conn);

?>
