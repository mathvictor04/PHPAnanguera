<?php

namespace ClinicaVeterinaria\projeto\DAO;

require_once __DIR__ . "/Conexao.php";

class ConsultarTutor {

    public function consultarTodos() {

        $conexao = new Conexao();
        $conn = $conexao->conectar();

        $sql = "SELECT * FROM tutor";

        $resultado = mysqli_query($conn, $sql);

        if (!$resultado) {
            mysqli_close($conn);
            return false;
        }

        $tutores = [];

        while ($dados = mysqli_fetch_assoc($resultado)) {
            $tutores[] = $dados;
        }

        mysqli_free_result($resultado);
        mysqli_close($conn);

        return $tutores;
    }
}

?>