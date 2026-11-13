<?php

namespace ClinicaVeterinaria\projeto\DAO;

use ClinicaVeterinaria\projeto\DAO\Conexao;

class Excluir {

    public function excluirVeterinario(
        Conexao $conexao,
        int $codigo
    ) {

        try {

            $conn = $conexao->conectar();

            $sql = "DELETE FROM veterinario WHERE codigo = ?";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "i", $codigo);

            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $mensagem = "Veterinário excluído com sucesso!";
            } else {
                $mensagem = "Veterinário não encontrado!";
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            return $mensagem;

        } catch (\Throwable $erro) {

            return "Erro ao excluir: " . $erro->getMessage();
        }
    }
}
?>
