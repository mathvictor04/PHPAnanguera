<?php

require_once __DIR__ . "/../DAO/consultarTutor.php";

use ClinicaVeterinaria\projeto\DAO\ConsultarTutor;

$consultar = new ConsultarTutor();

$tutores = $consultar->consultarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Tutores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    

<link rel="stylesheet" href="../CSS/estilo.css">
</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">Tutores Cadastrados</h2>

    <?php if ($tutores === false): ?>

        <div class="alert alert-danger">
            Erro ao consultar tutores.
        </div>

    <?php elseif (count($tutores) > 0): ?>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($tutores as $tutor): ?>

                    <tr>
                        <td><?= htmlspecialchars($tutor['codigo']) ?></td>
                        <td><?= htmlspecialchars($tutor['nome']) ?></td>
                        <td><?= htmlspecialchars($tutor['cpf']) ?></td>
                        <td><?= htmlspecialchars($tutor['telefone']) ?></td>
                        <td><?= htmlspecialchars($tutor['email']) ?></td>
                        <td><?= htmlspecialchars($tutor['endereco']) ?></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php else: ?>

        <div class="alert alert-info">
            Nenhum tutor cadastrado.
        </div>

    <?php endif; ?>

    <a href="tutor.php" class="btn btn-secondary">
        Voltar
    </a>

</div>

</body>
</html>