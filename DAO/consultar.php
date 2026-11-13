<?php

namespace ClinicaVeterinaria\projeto\DAO;

use ClinicaVeterinaria\projeto\DAO\Conexao;

class Consultar {

    public function consultarVeterinario(
        Conexao $conexao,
        int $codigo
    ) {

        try {

            $conn = $conexao->conectar();

            $sql = "SELECT * FROM veterinario WHERE codigo = ?";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "i", $codigo);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($dados = mysqli_fetch_assoc($result)) {

                $resposta =
                    "<br>Código: " . htmlspecialchars($dados['codigo']) .
                    "<br>Nome: " . htmlspecialchars($dados['nome']) .
                    "<br>Especialidade: " . htmlspecialchars($dados['especialidade']) .
                    "<br>Telefone: " . htmlspecialchars($dados['telefone']) .
                    "<br>Endereço: " . htmlspecialchars($dados['endereco']) .
                    "<br>Salário: R$ " . htmlspecialchars($dados['salario']);

                mysqli_stmt_close($stmt);
                mysqli_close($conn);

                return $resposta;
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            return "Veterinário não encontrado!";

        } catch (\Throwable $erro) {

            return "Erro ao consultar: " . $erro->getMessage();
        }
    }
}
?>
