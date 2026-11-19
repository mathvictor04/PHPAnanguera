<?php

namespace ClinicaVeterinaria\projeto\DAO;

require_once __DIR__ . "/Conexao.php";

class AtualizarTutor {

    public function atualizar(
        int $codigo,
        string $campo,
        string $novoDado
    ) {

        try {

            $camposPermitidos = [
                'nome',
                'cpf',
                'telefone',
                'email',
                'endereco'
            ];

            if (!in_array($campo, $camposPermitidos, true)) {
                return "Campo inválido!";
            }

            $conexao = new Conexao();
            $conn = $conexao->conectar();

            $sql = "UPDATE tutor SET `$campo` = ? WHERE codigo = ?";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "si",
                $novoDado,
                $codigo
            );

            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $mensagem = "Tutor atualizado com sucesso!";
            } else {
                $mensagem = "Nenhum dado alterado ou tutor não encontrado.";
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            return $mensagem;

        } catch (\Throwable $erro) {

            return "Erro ao atualizar: " . $erro->getMessage();
        }
    }
}

?>