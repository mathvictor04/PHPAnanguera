<?php

namespace ClinicaVeterinaria\projeto\DAO;

use ClinicaVeterinaria\projeto\DAO\Conexao;

class Inserir {

    public function cadastrarVeterinario(
        Conexao $conexao,
        string $nome,
        string $telefone,
        string $endereco,
        float $salario,
        string $especialidade
    ) {

        try {

            $conn = $conexao->conectar();

            $sql = "INSERT INTO veterinario
                    (nome, especialidade, salario, endereco, telefone)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "ssdss",
                $nome,
                $especialidade,
                $salario,
                $endereco,
                $telefone
            );

            $result = mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            if ($result) {
                return "Veterinário cadastrado com sucesso!";
            }

            return "Não foi possível cadastrar.";

        } catch (\Throwable $erro) {

            return "Erro ao cadastrar: " . $erro->getMessage();
        }
    }
}
?>
