
<?php

require_once __DIR__ . "/../DAO/AnimalDAO.php";

use ClinicaVeterinaria\projeto\DAO\AnimalDAO;

function voltar(string $mensagem): void {
    echo "<script>
        alert(" . json_encode($mensagem) . ");
        window.location.href = '../HTML/telaAnimal.php';
    </script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../HTML/telaAnimal.php");
    exit;
}

$codigo = filter_input(INPUT_POST, "codigo", FILTER_VALIDATE_INT);
$nome = trim($_POST["nome"] ?? "");
$especie = trim($_POST["especie"] ?? "");
$raca = trim($_POST["raca"] ?? "");
$sexo = trim($_POST["sexo"] ?? "");
$dataNascimento = $_POST["data_nascimento"] ?? "";
$codigoTutor = filter_input(INPUT_POST, "codigo_tutor", FILTER_VALIDATE_INT);

$dataValida = false;

if ($dataNascimento !== "") {
    $data = DateTime::createFromFormat("!Y-m-d", $dataNascimento);

    $dataValida = $data &&
        $data->format("Y-m-d") === $dataNascimento &&
        $dataNascimento <= date("Y-m-d");
}

if (
    $nome === "" ||
    $especie === "" ||
    $raca === "" ||
    !in_array($sexo, ["Macho", "Fêmea"], true) ||
    !$dataValida ||
    !$codigoTutor ||
    $codigoTutor < 1
) {
    voltar("Preencha todos os campos corretamente!");
}

try {

    $animalDAO = new AnimalDAO();

    $resultado = $animalDAO->cadastrar(
        $nome,
        $especie,
        $raca,
        $sexo,
        $dataNascimento,
        $codigoTutor
    );

    if ($resultado) {
        echo "<script>
            alert('Animal cadastrado com sucesso!');
            window.location.href = '../HTML/consultarAnimal.php';
        </script>";
        exit;
    }

    voltar("Erro ao cadastrar animal. Verifique se o tutor existe.");

} catch (Throwable $erro) {
    voltar("Não foi possível cadastrar o animal.");
}
?>
