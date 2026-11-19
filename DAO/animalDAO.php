<?php

namespace ClinicaVeterinaria\projeto\DAO;

require_once __DIR__ . "/Conexao.php";

class AnimalDAO {

    private $conexao;

    public function __construct() {
        $objConexao = new Conexao();
        $this->conexao = $objConexao->conectar();
    }

    // CADASTRAR ANIMAL
    public function cadastrar(
        string $nome,
        string $especie,
        string $raca,
        string $sexo,
        string $dataNascimento,
        int $codigoTutor
    ) {

        $sql = "INSERT INTO animal
                (nome, especie, raca, sexo, data_nascimento, codigo_tutor)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->conexao, $sql);

        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param(
            $stmt,
            "sssssi",
            $nome,
            $especie,
            $raca,
            $sexo,
            $dataNascimento,
            $codigoTutor
        );

        $resultado = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resultado;
    }

    // LISTAR TODOS OS TUTORES PARA O SELECT
    public function listarTutores() {

        $sql = "SELECT codigo, nome FROM tutor ORDER BY nome";

        $resultado = mysqli_query($this->conexao, $sql);

        if (!$resultado) {
            return false;
        }

        $tutores = [];

        while ($dados = mysqli_fetch_assoc($resultado)) {
            $tutores[] = $dados;
        }

        mysqli_free_result($resultado);

        return $tutores;
    }

    // LISTAR TODOS OS ANIMAIS
    public function listarTodos() {

        $sql = "SELECT
                    animal.codigo,
                    animal.nome,
                    animal.especie,
                    animal.raca,
                    animal.sexo,
                    animal.data_nascimento,
                    animal.codigo_tutor,
                    tutor.nome AS nome_tutor
                FROM animal
                INNER JOIN tutor
                ON animal.codigo_tutor = tutor.codigo
                ORDER BY animal.codigo DESC";

        $resultado = mysqli_query($this->conexao, $sql);

        if (!$resultado) {
            return false;
        }

        $animais = [];

        while ($dados = mysqli_fetch_assoc($resultado)) {
            $animais[] = $dados;
        }

        mysqli_free_result($resultado);

        return $animais;
    }

    // BUSCAR ANIMAL PELO CÓDIGO
    public function buscarPorCodigo(int $codigo) {

        $sql = "SELECT * FROM animal WHERE codigo = ?";

        $stmt = mysqli_prepare($this->conexao, $sql);

        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param($stmt, "i", $codigo);

        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);

        $animal = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);

        return $animal ?: false;
    }

    // ATUALIZAR ANIMAL
    public function atualizar(
        int $codigo,
        string $nome,
        string $especie,
        string $raca,
        string $sexo,
        string $dataNascimento,
        int $codigoTutor
    ) {

        $sql = "UPDATE animal SET
                    nome = ?,
                    especie = ?,
                    raca = ?,
                    sexo = ?,
                    data_nascimento = ?,
                    codigo_tutor = ?
                WHERE codigo = ?";

        $stmt = mysqli_prepare($this->conexao, $sql);

        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param(
            $stmt,
            "sssssii",
            $nome,
            $especie,
            $raca,
            $sexo,
            $dataNascimento,
            $codigoTutor,
            $codigo
        );

        $resultado = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resultado;
    }

    // EXCLUIR ANIMAL
    public function excluir(int $codigo) {

        $sql = "DELETE FROM animal WHERE codigo = ?";

        $stmt = mysqli_prepare($this->conexao, $sql);

        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param($stmt, "i", $codigo);

        $resultado = mysqli_stmt_execute($stmt);

        $excluido = mysqli_stmt_affected_rows($stmt) > 0;

        mysqli_stmt_close($stmt);

        return $resultado && $excluido;
    }

    // FECHAR CONEXÃO
    public function __destruct() {
        if ($this->conexao) {
            mysqli_close($this->conexao);
        }
    }
}
?>
