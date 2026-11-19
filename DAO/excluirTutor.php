<?php

namespace ClinicaVeterinaria\projeto\DAO;

require_once __DIR__ . "/Conexao.php";

class ExcluirTutor {

    public function excluir(int $codigo) {

        try {

            $conexao = new Conexao();
            $conn = $conexao->conectar();

            $sql = "DELETE FROM tutor WHERE codigo = ?";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "i",
                $codigo
            );

            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {

                $mensagem = "Tutor excluído com sucesso!";

            } else {

                $mensagem = "Tutor não encontrado!";
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