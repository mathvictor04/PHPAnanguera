<?php
require_once __DIR__ . "/../DAO/TutorDAO.php";
$tutorDAO = new \ClinicaVeterinaria\projeto\DAO\TutorDAO();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];

    $tutorDAO = new TutorDAO();
    $resultado = $tutorDAO->cadastrarTutor($nome, $cpf, $telefone, $email, $endereco);
    if ($resultado) {
        echo "<script>alert('Tutor cadastrado com sucesso!');window.location.href='../HTML/tutor.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar tutor!');window.history.back();</script>";
    }
} else {
    header("Location: ../HTML/tutor.php");
    exit;
}
?>