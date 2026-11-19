
<?php

require_once __DIR__ . "/../DAO/AnimalDAO.php";

use ClinicaVeterinaria\projeto\DAO\AnimalDAO;

$animalDAO = new AnimalDAO();

$codigo = filter_input(INPUT_GET, "codigo", FILTER_VALIDATE_INT);

if (!$codigo || $codigo < 1) {
    header("Location: consultarAnimal.php");
    exit;
}

$animal = $animalDAO->buscarPorCodigo($codigo);
$tutores = $animalDAO->listarTutores();

if (!$animal) {
    header("Location: consultarAnimal.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $especie = trim($_POST["especie"] ?? "");
    $raca = trim($_POST["raca"] ?? "");
    $sexo = trim($_POST["sexo"] ?? "");
    $dataNascimento = $_POST["data_nascimento"] ?? "";
    $codigoTutor = filter_input(INPUT_POST, "codigo_tutor", FILTER_VALIDATE_INT);

    $data = DateTime::createFromFormat("!Y-m-d", $dataNascimento);

    $dataValida = $data &&
        $data->format("Y-m-d") === $dataNascimento &&
        $dataNascimento <= date("Y-m-d");

    if (
        $nome !== "" &&
        $especie !== "" &&
        $raca !== "" &&
        in_array($sexo, ["Macho", "Fêmea"], true) &&
        $dataValida &&
        $codigoTutor &&
        $codigoTutor > 0
    ) {

        $resultado = $animalDAO->atualizar(
            $codigo,
            $nome,
            $especie,
            $raca,
            $sexo,
            $dataNascimento,
            $codigoTutor
        );

        if ($resultado) {
            echo "<script>
                alert('Animal atualizado com sucesso!');
                window.location.href='consultarAnimal.php';
            </script>";
            exit;
        }

        $mensagem = "Não foi possível atualizar o animal.";

    } else {
        $mensagem = "Preencha todos os campos corretamente!";
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Atualizar Animal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../CSS/estilo.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a href="../index.php" class="navbar-brand">🐾 Clínica Veterinária</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow mx-auto" style="max-width: 750px;">

        <div class="card-header bg-warning">
            <h4 class="mb-0">Atualizar Animal</h4>
        </div>

        <div class="card-body">

            <?php if (!empty($mensagem)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($mensagem) ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Código:</label>
                    <input type="text" class="form-control"
                        value="<?= (int)$animal['codigo'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control"
                        maxlength="150"
                        value="<?= htmlspecialchars($animal['nome']) ?>" required>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Espécie:</label>
                        <input type="text" name="especie" class="form-control"
                            maxlength="100"
                            value="<?= htmlspecialchars($animal['especie']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Raça:</label>
                        <input type="text" name="raca" class="form-control"
                            maxlength="100"
                            value="<?= htmlspecialchars($animal['raca']) ?>" required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sexo:</label>
                        <select name="sexo" class="form-select" required>
                            <option value="Macho"
                                <?= $animal['sexo'] === 'Macho' ? 'selected' : '' ?>>
                                Macho
                            </option>

                            <option value="Fêmea"
                                <?= $animal['sexo'] === 'Fêmea' ? 'selected' : '' ?>>
                                Fêmea
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Data de nascimento:</label>
                        <input type="date" name="data_nascimento"
                            class="form-control"
                            max="<?= date('Y-m-d') ?>"
                            value="<?= htmlspecialchars($animal['data_nascimento']) ?>"
                            required>
                    </div>

                </div>

                <div class="mb-4">
                    <label class="form-label">Tutor:</label>

                    <select name="codigo_tutor" class="form-select" required>

                        <?php foreach ($tutores as $tutor): ?>

                            <option value="<?= (int)$tutor['codigo'] ?>"
                                <?= (int)$animal['codigo_tutor'] === (int)$tutor['codigo'] ? 'selected' : '' ?>>

                                <?= htmlspecialchars($tutor['nome']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    Salvar Alterações
                </button>

                <a href="consultarAnimal.php" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
