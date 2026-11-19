<?php

namespace ClinicaVeterinaria\projeto\HTML;

require_once('../DAO/Conexao.php');
require_once('../DAO/atualizarTutor.php');

use ClinicaVeterinaria\projeto\DAO\AtualizarTutor;

$atualizar = new AtualizarTutor();

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $codigo = filter_input(
        INPUT_POST,
        'codigo',
        FILTER_VALIDATE_INT
    );

    $campo = $_POST['campo'] ?? '';
    $novoDado = trim($_POST['novoDado'] ?? '');

    if (
        $codigo !== false &&
        $codigo !== null &&
        $codigo > 0 &&
        $novoDado !== ''
    ) {

        $resultado = $atualizar->atualizar(
            $codigo,
            $campo,
            $novoDado
        );

    } else {

        $resultado = "Preencha os campos corretamente!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atualizar Tutor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../CSS/estilo.css">

</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">Atualizar Tutor</h2>

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

        <div class="mb-3">

            <label class="form-label">
                Escolha o campo que deseja atualizar:
            </label>

            <select name="campo" class="form-select" required>

                <option value="nome">Nome</option>
                <option value="cpf">CPF</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
                <option value="endereco">Endereço</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Novo dado:</label>

            <input
                type="text"
                name="novoDado"
                class="form-control"
                required
            >

        </div>

        <button type="submit" class="btn btn-primary">
            Atualizar
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