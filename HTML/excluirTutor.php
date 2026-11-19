<?php

namespace ClinicaVeterinaria\projeto\HTML;

require_once('../DAO/Conexao.php');
require_once('../DAO/excluirTutor.php');

use ClinicaVeterinaria\projeto\DAO\ExcluirTutor;

$excluir = new ExcluirTutor();

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $codigo = filter_input(
        INPUT_POST,
        'codigo',
        FILTER_VALIDATE_INT
    );

    if (
        $codigo !== false &&
        $codigo !== null &&
        $codigo > 0
    ) {

        $resultado = $excluir->excluir($codigo);

    } else {

        $resultado = "Informe um código válido!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Excluir Tutor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../CSS/estilo.css">

</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">Excluir Tutor</h2>

    <form method="POST">

        <div class="mb-3">

            <label class="form-label">Código do Tutor:</label>

            <input
                type="number"
                name="codigo"
                class="form-control"
                min="1"
                required
            >

        </div>

        <button type="submit" class="btn btn-danger">
            Excluir Tutor
        </button>

        <a href="tutor.php" class="btn btn-secondary">
            Voltar
        </a>

    </form>

    <div class="mt-3">

        <?php echo htmlspecialchars($resultado); ?>

    </div>

</div>

</body>
</html>