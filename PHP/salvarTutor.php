<?php

require_once __DIR__ . "/../DAO/TutorDAO.php";

use ClinicaVeterinaria\projeto\DAO\TutorDAO;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = filter_input(INPUT_POST, "codigo", FILTER_VALIDATE_INT);
    $nome = trim($_POST["nome"] ?? "");
    $cpf = trim($_POST["cpf"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $endereco = trim($_POST["endereco"] ?? "");

    if ($nome !== "" && $cpf !== "" && $telefone !== "") {

        $tutorDAO = new TutorDAO();

        $resultado = $tutorDAO->cadastrarTutor(
            $nome,
            $cpf,
            $telefone,
            $email,
            $endereco
        );

        if ($resultado) {

            echo "<script>
                alert('Tutor cadastrado com sucesso!');
                window.location.href='../HTML/tutor.php';
            </script>";

        } else {

            echo "<script>
                alert('Erro ao cadastrar tutor!');
                window.history.back();
            </script>";
        }

    } else {

        echo "<script>
            alert('Preencha os campos obrigatórios!');
            window.history.back();
        </script>";
    }

} else {

    header("Location: ../HTML/tutor.php");
    exit;
}

?>