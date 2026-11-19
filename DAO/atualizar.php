<?php

namespace ClinicaVeterinaria\projeto\DAO;

use ClinicaVeterinaria\projeto\DAO\Conexao;

class Atualizar {

    public function atualizar(
        Conexao $conexao,
        int $codigo,
        string $campo,
        string $novoDado
    ) {

        try {

            $camposPermitidos = [
                'nome',
                'telefone',
                'especialidade',
                'endereco',
                'salario'
            ];

            if (!in_array($campo, $camposPermitidos, true)) {
                return "Campo inválido!";
            }

            $conn = $conexao->conectar();

            $sql = "UPDATE veterinario SET `$campo` = ? WHERE codigo = ?";

            $stmt = mysqli_prepare($conn, $sql);

           if ($campo === 'salario') {

    if (!is_numeric($novoDado) || (float)$novoDado < 0) {
        return "Informe um salário válido!";
    }

    $novoDado = (float)$novoDado;

    if ($campo === 'salario') {

    if (!is_numeric($novoDado) || (float)$novoDado < 0) {
        return "Informe um salário válido!";
    }

    $novoDado = (float)$novoDado;

    mysqli_stmt_bind_param(
        $stmt,
        "di",
        $novoDado,
        $codigo
    );

} else {

    mysqli_stmt_bind_param(
        $stmt,
        "si",
        $novoDado,
        $codigo
    );
}
}

            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $mensagem = "Dado atualizado com sucesso!";
            } else {
                $mensagem = "Nenhum dado alterado ou veterinário não encontrado.";
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
