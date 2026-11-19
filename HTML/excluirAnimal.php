
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

if (!$animal) {
    header("Location: consultarAnimal.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $resultado = $animalDAO->excluir($codigo);

    if ($resultado) {
        echo "<script>
            alert('Animal excluído com sucesso!');
            window.location.href='consultarAnimal.php';
        </script>";
        exit;
    }

    $mensagem = "Não foi possível excluir o animal.";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Excluir Animal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../CSS/estilo.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a href="../index.php" class="navbar-brand">
            🐾 Clínica Veterinária
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow mx-auto" style="max-width: 550px;">

        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Excluir Animal</h4>
        </div>

        <div class="card-body">

            <?php if (!empty($mensagem)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($mensagem) ?>
                </div>
            <?php endif; ?>

            <div class="alert alert-warning">
                Tem certeza que deseja excluir este animal?
            </div>

            <p><strong>Código:</strong>
                <?= (int)$animal['codigo'] ?>
            </p>

            <p><strong>Nome:</strong>
                <?= htmlspecialchars($animal['nome']) ?>
            </p>

            <p><strong>Espécie:</strong>
                <?= htmlspecialchars($animal['especie']) ?>
            </p>

            <form method="POST">

                <button type="submit" class="btn btn-danger">
                    Confirmar Exclusão
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
