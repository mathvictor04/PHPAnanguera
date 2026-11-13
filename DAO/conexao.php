<?php
namespace ClinicaVeterinaria\projeto\DAO;

class Conexao {

    public function conectar() {

        $conn = mysqli_connect(
            'localhost',
            'root',
            '',
            'clinicaVeterinaria'
        );

        if (!$conn) {
            die("Erro na conexão: " . mysqli_connect_error());
        }

        mysqli_set_charset($conn, "utf8mb4");

        return $conn;
    }
}
?>
